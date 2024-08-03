<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{


    public function ShowCarousel()

    {
        $breakingNews = News::where('news_type', 'Breaking News')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        $leatestNews = News::with('category')->get();
        $recentNews = $leatestNews->sortByDesc('created_at')->take(6); // Retrieve all news items
        return view('UI.Home.home', compact('recentNews', 'leatestNews', 'breakingNews')); // Return view with news data
    }
    public function singleNewsShow($id)
    {
        $news = News::find($id);
        $leatestNews = News::all();
        $recentNews = $leatestNews->sortByDesc('created_at')->take(10);
        return view('UI.Single News Show.singleNewsShow', compact('news', 'recentNews'));
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
        // // Validate the request
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'news_type' => 'required|string',
        //     'category_id' => 'required|exists:categories,id',
        //     'language_id' => 'required|exists:languages,id',
        // ]);

        if ($request->hasFile('img')) {
            // Store the image
            $imagePath = $request->file('img')->store('public/images');

            // Save news to the database
            News::create([
                'title' => $request->title,
                'description' => $request->description,
                'img' => str_replace('public/', '', $imagePath),
                'news_type' => $request->news_type,
                'category_id' => $request->category_id,
                'language_id' => $request->language_id,
                'reporter_id' => auth()->user()->id,

            ]);

            return redirect()->route('news.list')->with('success', 'News created successfully.');
        } else {
            return redirect()->back()->with('error', 'Image file not received.');
        }
    }



    public function Edit($id)
    {
        $news = News::findOrFail($id);
        $languages = Language::all();
        $categories = Category::all();

        return view('Admin.Reporter.News.editNews', compact('news', 'languages', 'categories'));
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|url',
            'news_type' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'language_id' => 'required|exists:languages,id',
        ]);

        $news = News::findOrFail($id);
        $news->update([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $request->img,
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

    // app/Http/Controllers/NewsController.php
    public function PopupDetails($id)
    {
        $popup_news = News::find($id);
        $categories = Category::all();
        return view('Admin.Reporter.News.showNews', compact('news', 'categories'));
    }

        // public function Show(Request $request)
    // {
    //     $languageId = $request->input('language_id', null);
    //     $newsType = $request->input('news_type', null);

    //     // Get all languages for the dropdown
    //     $languages = Language::all();

    //     // Query the news
    //     $query = News::query();

    //     if ($languageId) {
    //         $query->where('language_id', $languageId);
    //     }

    //     if ($newsType) {
    //         $query->where('news_type', $newsType);
    //     }

    //     // Get the filtered or all news
    //     $news = $query->get();

    //     return view('Admin.Reporter.News.showNews', compact('news', 'languages'));
    // }



    public function show(Request $request)
{
    // Get the selected news type from the request
    $newsType = $request->input('news_type');

    // Query the news items with optional filtering
    $newsQuery = News::query();

    if ($newsType) {
        $newsQuery->where('news_type', $newsType);
    }

    // Fetch all available news items
    $news = $newsQuery->orderBy('created_at', 'desc')->get();

    // Fetch all languages for the filter
    $languages = Language::all();

    return view('UI.All News Show.allNewsShow', compact('news', 'languages'));
}




}
