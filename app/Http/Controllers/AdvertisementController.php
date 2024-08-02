<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function Index()
    {
        return view('Admin.SuperAdmin.Advertisement.addAdvertisement');
    }

    public function store(Request $request)
    {
        try {
            $request->validate(([

                'img' => 'required|url',
                'advertisement_type' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',

            ]));

            $advertisements = Advertisement::create(
                $request->all(),
            );
            $advertisements->save();



            return redirect()->route('advertisements.list')->with('success', 'Advertisement created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the advertisement.');
        }
    }


    public function Show(Request $request)
    {
        $advertisementType = $request->input('advertisement_type', null);

        // Query the news
        $query = Advertisement::query();

        if ($advertisementType) {
            $query->where('advertisement_type', $advertisementType);
        }

        // Get the filtered or all news
        $advertisements = $query->get();

        // $advertisements = Advertisement::all();
        return view('Admin.SuperAdmin.Advertisement.showAdvertisement', compact('advertisements'));
    }

    public function Destroy($id)
    {
        $advertisements = Advertisement::findOrFail($id);
        $advertisements->delete();

        return redirect()->route('advertisements.list')->with('success', 'News deleted successfully.');
    }
}
