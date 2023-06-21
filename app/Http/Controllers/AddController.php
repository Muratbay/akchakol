<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AddController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'count' => 'required|numeric',
            'card_term' => 'required|numeric',
            'card_number' => 'required|numeric'
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'count' => $request->count,
            'card_term' => $request->card_term,
            'card_number' => $request->card_number
        ]);

        return redirect('/');
    }
}
