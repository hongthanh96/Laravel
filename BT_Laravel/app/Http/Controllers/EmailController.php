<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
   public function index(){
       return view('checkEmail.index');
   }
   public function validatetionEmail(Request $request){
       $email = $request->email;
       $isEmail = true;
       if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
           $isEmail = false;
       }
       return view('checkEmail.index' ,compact('isEmail'));
   }
}
