<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $success = true;

        $validator = Validator::make($data, 
        [
            'name' => 'required|string|max:60',
            'email' => 'required|email|max:130',
            'message' => 'required|string:min:10',
        ],
        [
            'name.required' => 'Il campo nome è obbligatorio',
            'name.string' => 'Il campo nome deve essere una stringa',
            'name.max' => 'Il campo nome deve essere lungo massimo 60 caratteri',
            'email.required' => 'Il campo email è obbligatorio',
            'email.email' => 'Il campo email deve essere un indirizzo email valido',
            'email.max' => 'Il campo email deve essere lungo massimo 130 caratteri',
            'message.required' => 'Il campo messaggio è obbligatorio',
            'message.string' => 'Il campo messaggio deve essere una stringa',
            'message.min' => 'Il campo messaggio deve essere lungo minimo 10 caratteri',
        ]
    );

    if ($validator->fails()) {
        $success = false;
        $errors = $validator->errors();
        return response()->json(compact('success', 'errors'));
    }

    $new_lead = new Lead();
    $new_lead->fill($data);
    $new_lead->save();

    return response()->json(compact('success'));

    }
}
