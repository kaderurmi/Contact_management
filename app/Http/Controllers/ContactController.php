<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{  
/**
 * Display a listing of the resource.
 */
  public function index(Request $request)
        {
            $query = Contact::query();
    
            // Search functionality
            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('email', 'LIKE', "%{$search}%");
            }
    
            // Sorting functionality
            if ($request->has('sort')) {
                $sort = $request->input('sort');
                $query->orderBy($sort, 'asc');
            }
    
            $contacts = $query->get();
    
            return view('contacts.index', compact('contacts'));
        }


     

/**
 * Show the form for creating a new resource.
 */
 
    public function create()
        {
            return view('contacts.create');
        }
/**
 * Store a newly created resource in storage.
 */
    public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:contacts',
                'phone' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:255',
            ]);
    
            Contact::create($request->all());
    
            return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
        }
/**
 * Display the specified resource.
 */
public function show(Contact $contact)
        {
            return view('contacts.show', compact('contact'));
        }

/**
 * Show the form for editing the specified resource.
 */
        public function edit(Contact $contact)
        {
            return view('contacts.edit', compact('contact'));
        }
/**
 * Update the specified resource in storage.
 */
public function update(Request $request, Contact $contact)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:contacts,email,' . $contact->id,
                'phone' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:255',
            ]);
    
            $contact->update($request->all());
    
            return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
        }
/**
 * Remove the specified resource from storage.
 */
    public function destroy(Contact $contact)
        {
            $contact->delete();
    
            return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
        }
    }
