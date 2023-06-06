<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\BoolContact;

class LeadController extends Controller
{
    public function store(Request $request){

        $inputData = $request->all();

        $validator = Validator::make($inputData,
        [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]
        );

        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'errors' => $validator->errors()
                ]
            );
        }
        
    
        $newLead = new Lead();
        $newLead->name = $inputData['name'];
        $newLead->email = $inputData['email'];
        $newLead->message = $inputData['message'];
        $newLead->save();

        $contactObject = new BoolContact($newLead);

        Mail::to('in.mattiamoneta@gmail.com')->send($contactObject);
    
        return response()->json([
                'success' => true,
                'errors' => $validator->errors()
            ]);

    }
}
