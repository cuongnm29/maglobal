<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Contact;
use Gate;
class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::get();  
        return view('admin.contact.index', compact('contact'));
    }
    public function destroy(Contact $contact)
    {
        abort_if(Gate::denies('contact_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contact->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactRequest $request)
    {
        Contact::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
