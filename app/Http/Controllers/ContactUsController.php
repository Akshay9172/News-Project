<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:show-contactus|contact-us|delete-contactus', ['only' => ['showContactUs']]);
    //      $this->middleware('permission:contact-us', ['only' => ['addContactUs','storeContactUs']]);
    //      $this->middleware('permission:delete-contactus', ['only' => ['deleteContactUs']]);
    // }

    public function addContactUs()
    {
        return view('UI.Contact_Us.contactUs');
    }

    public function storeContactUs(Request $request)
    {
        $contactUs = new ContactUs();
        $contactUs->name = $request->name;
        $contactUs->email = $request->email;
        $contactUs->subject = $request->subject;
        $contactUs->message = $request->message;
        $contactUs->save();
        //  echo "added";
        return redirect('/show-contactus');
    }

    public function showContactUs()
    {
        $contactUs = ContactUs::all();
        return view('UI.Contact_Us.showContactUS')->with('contactUs', $contactUs);
    }

    public function deleteContactUs($id)
    {
        $contactUs = ContactUs::find($id);
        $contactUs->delete();
        return redirect('/show-contactus');
    }
}
