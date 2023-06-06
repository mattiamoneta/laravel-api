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
        $newLead->object = $inputData['object'];
        $newLead->message = $inputData['message'];
        $newLead->save();

        Mail::to('example@mail.com')->send(new BoolContact);
    

    }
}
