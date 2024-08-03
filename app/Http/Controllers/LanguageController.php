<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('Admin.SuperAdmin.Languages.showLanguage', compact('languages'));
    }

    public function create()
    {
        return view('Admin.SuperAdmin.Languages.addLanguage');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Language::create([
            'name' => $request->name,
        ]);

        return redirect('/languages')->with('success', 'Language added successfully');
    }
    public function destroy($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();

        return redirect()->back()->with('success', 'Language deleted successfully');
    }
}
