<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;
use App\Contact;
use App\Category;
use App\Setting;
use App\Blog;
class ContactController extends Controller
{
    public function CreateContact(StoreContactRequest $request)
    {
        
        $contact = Contact::create($request->all() );
      
        return redirect()->route('contact')->with('success','Thank you for getting in touch. We will respond to you very soon. ');
    }
}
