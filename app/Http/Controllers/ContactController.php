<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function sendEmail(Request $request){
        $request->validate([
            'department_id' => 'required|integer|in:1,2,3',
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'comments' => 'nullable|string|max:1000'
        ]);

        //Define los correos electrónicos para cada departamento
        $departmentMails = [
            1 => 'emailsendertest31@gmail.com',
            2 => 'ruizd31100779@gmail.com',
            3 => 'djruizp31@gmail.com'
        ];
        
        $mail = $departmentMails[$request->input('department_id')];

        Mail::to($mail)->send(new ContactMail($request->all()));


        return response()->json(['message' => 'Email sent successfully']);
    }
}
