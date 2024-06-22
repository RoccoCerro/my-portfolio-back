<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewLead;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        // validiamo i dati che arrivano dal form
        $data = $request->all();

        $validator = Validator::make($data,[
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        
        // se la validazione è fallita
        // return una response in json con gli errori
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        // altrimenti
        // se i dati sono validi 
        // salviamo il nuovo lead nel db
        $lead = Lead::create($data);
        // inviamo la mail
        Mail::to('rcerro02@gmail.com')->send(new NewLead($lead));
        // ritorniamo una response json con indicato il risultato di successo
        return response()->json([
            'success' =>true 
        ]);
    }
}
