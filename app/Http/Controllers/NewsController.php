<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{


    public function ShowCarousel()

    {
        $breakingNews = News::where('news_type', 'Breaking News')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        $leatestNews = News::all();
        $recentNews = $leatestNews->sortByDesc('created_at')->take(6); // Retrieve all news items
        return view('UI.home ', compact('recentNews', 'leatestNews', 'breakingNews')); // Return view with news data
    }
    public function singleNewsShow($id)
    {
        $news = News::find($id);
        $leatestNews = News::all();
        $recentNews = $leatestNews->sortByDesc('created_at')->take(10);
        return view('UI.singleNewsShow', compact('news', 'recentNews'));
    }

    public function Index()
    {
        $languages = Language::all();
        $categories = Category::all();
        return view('Admin.Reporter.News.addNews', compact('languages', 'categories'));
    }
    public function Store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|url',
            'news_type' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'language_id' => 'required|exists:languages,id',
        ]);

        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $request->img,
            'news_type' => $request->news_type,
            'category_id' => $request->category_id,
            'language_id' => $request->language_id,
            'reporter_id' => auth()->user()->id,
        ]);

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
}
