<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\BoolContact;

class LeadController extends Controller
{
    public function store(Request $request){
        
        $inputData = $request->all();

        $newLead = new Lead();
        $newLead->name = $inputData['name'];
        $newLead->email = $inputData['email'];
        $newLead->message = $inputData['message'];
        $newLead->save();

        $contactObject = new BoolContact($newLead);
        Mail::to('in.mattiamoneta@gmail.com')->send($contactObject);
    
        return response()->json([
                'success' => true
            ]);

    }
}
