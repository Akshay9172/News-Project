<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\Advertisement;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::all();
        return view('Admin.SuperAdmin.Advertisement.showAdvertisement', compact('advertisements'));
    }

    public function create()
    {
        return view('Admin.SuperAdmin.Advertisement.addAdvertisement');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('advertisements', 'public');

        Advertisement::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => $imagePath,
        ]);

        return redirect()->route('advertisements.index')->with('success', 'Advertisement created successfully.');
    }

    public function show(Advertisement $advertisement)
    {
        return view('Admin.SuperAdmin.Advertisement.showAdvertisement', compact('advertisement'));
    }

    public function edit(Advertisement $advertisement)
    {
        return view('Admin.SuperAdmin.Advertisement.editAdvertisement', compact('advertisement'));
    }

    public function update(Request $request, Advertisement $advertisement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('advertisements', 'public');
            $data['image_path'] = $imagePath;
        }

        $advertisement->update($data);

        return redirect()->route('advertisements.index')->with('success', 'Advertisement updated successfully.');
    }

    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return redirect()->route('advertisements.index')->with('success', 'Advertisement deleted successfully.');
    }
}
