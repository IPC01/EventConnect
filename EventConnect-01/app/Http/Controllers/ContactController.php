<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.pages.contact', compact('contacts'));
    }

    public function create()
    {
        return view('shop.pages.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.create')
                         ->with('success', 'Contato criado com sucesso!');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')
                         ->with('success', 'Contato atualizado com sucesso!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')
                         ->with('success', 'Contato deletado com sucesso!');
    }
}
