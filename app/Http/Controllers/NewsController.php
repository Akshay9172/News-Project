<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\BaseModel;
use App\Models\Category;
use App\Models\Language;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{




    public function ShowHomePageNews()

    {
        $ads = Advertisement::all();
        $categories = Category::all();
        $breakingNews = News::where('news_type', 'Breaking News')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        $leatestNews = News::with('category')->get();
        $recentNews = $leatestNews->sortByDesc('created_at')->take(6); // Retrieve all news items
        return view('UI.Home.home', compact('recentNews', 'leatestNews', 'breakingNews', 'categories', 'ads')); // Return view with news data
    }
    // app/Http/Controllers/NewsController.php

    public function showNewsByCategory($id)
    {
        $ads = Advertisement::all();
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
        $breakingNews = News::where('news_type', 'Breaking News')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        $leatestNews = News::with('category')->get();
        $recentNews = $leatestNews->sortByDesc('created_at')->take(6);
        $newsByCategory = News::where('category_id', $id)->get();
        $categories = Category::all();
        return view('UI.Home.home', compact('newsByCategory', 'category', 'ads', 'breakingNews', 'recentNews', 'leatestNews', 'categories'));
    }

    public function singleNewsShow($id)
    {
        $news = News::find($id);
        $leatestNews = News::all();
        $recentNews = $leatestNews->sortByDesc('created_at')->take(10);
        $categories = Category::all();
        return view('UI.Single News Show.singleNewsShow', compact('news', 'recentNews', 'leatestNews', 'categories'));
    }
    public function allNewsShow()
    {
        $news = News::all();
        return view('UI.All News Show.allNewsShow', compact('news'));
    }

    public function Index()
    {
        $languages = Language::all();
        $categories = Category::all();
        return view('Admin.Reporter.News.addNews', compact('languages', 'categories'));
    }


    public function Store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'news_type' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'language_id' => 'required|exists:languages,id',
        ]);

        // Handle image upload to S3
        $image = $request->file('img');
        if ($image) {
            $path = $image->store('news_imge/news', 's3');
            $imageUrl = "https://news-tifin-test.s3.amazonaws.com/$path";
        }


        $title = $request->input('title');
        $words = explode(' ', $title);
        $firstTwoWords = implode('-', array_slice($words, 0, 6));
        $slug = strtolower($firstTwoWords);

        $news = News::create(array_merge(
            $request->all(),
            [
                'reporter_id' => auth()->user()->id,
                'img' => $imageUrl
            ]
        ));
        $news->slug = $slug;
        $news->save();
        return redirect()->route('news.list')->with('success', 'News created successfully.');
    }




    public function Show(Request $request)
    {
        $languageId = $request->input('language_id', null);
        $newsType = $request->input('news_type', null);

        // Get all languages for the dropdown
        $languages = Language::all();

        // Query the news
        $query = News::query();

        if ($languageId) {
            $query->where('language_id', $languageId);
        }

        if ($newsType) {
            $query->where('news_type', $newsType);
        }

        // Get the filtered or all news
        $news = $query->get();

        return view('Admin.Reporter.News.showNews', compact('news', 'languages'));
    }
    public function Edit($id)
    {
        $news = News::findOrFail($id);
        $languages = Language::all();
        $categories = Category::all();

        return view('Admin.Reporter.News.editNews', compact('news', 'languages', 'categories'));
    }

    // public function Update(Request $request, $id)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'img' => 'nullable|url',
    //         'news_type' => 'required|string',
    //         'category_id' => 'required|exists:categories,id',
    //         'language_id' => 'required|exists:languages,id',
    //     ]);

    //     $news = News::findOrFail($id);
    //     $news->update([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'img' => $request->img,
    //         'news_type' => $request->news_type,
    //         'category_id' => $request->category_id,
    //         'language_id' => $request->language_id,
    //     ]);

    //     return redirect()->route('news.list')->with('success', 'News updated successfully.');
    // }
    public function Update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image file
            'news_type' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'language_id' => 'required|exists:languages,id',
        ]);

        $news = News::findOrFail($id);

        // Handle image upload to S3 if a new image is provided
        $image = $request->file('img');
        if ($image) {
            $path = $image->store('images/news', 's3');
            $imageUrl = "https://news-tifin-test.s3.amazonaws.com/$path";
        } else {
            // Preserve the existing image URL if no new image is provided
            $imageUrl = $news->img;
        }

        // Update news entry in database
        $news->update([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $imageUrl, // Store the new image URL or preserve the existing one
            'news_type' => $request->news_type,
            'category_id' => $request->category_id,
            'language_id' => $request->language_id,
        ]);

        return redirect()->route('news.list')->with('success', 'News updated successfully.');
    }


    public function Destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.list')->with('success', 'News deleted successfully.');
    }

    public function ViewNews($id)
    {
        $news = News::find($id);

        if (!$news) {
            return response()->json(['error' => 'News not found'], 404);
        }

        return view('Admin.Reporter.News.partials.viewNews', compact('news'));
    }
}
