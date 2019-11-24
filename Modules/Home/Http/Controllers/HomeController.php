<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Jobs\Contactus;
use App\Mail\ContactusShipped;
use Validator;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('home::index');
    }
   
   public function contactus(Request $request)
    {
        $rules=[
    'name'         =>'required',   
    'email'        =>'required',
    'phone'        =>'required|digits:10',
    'subject'      =>'required',
    'message'      =>'required', 
             ];
        $messages =[
            'name.required'        =>'Name is required',
            'email.required'       =>'Email is required',
            'email.email' => 'Please enter a valid email address',
            'phone.required'       =>'Phone is required',
            'subject.required'     =>'Subject is required',
            'message.required'       =>'Message is required',
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();               
        }
     $data['name']=$request->get('name');
     $data['email']    =$request->get('email');
     $data['phone']    =$request->get('phone');
     $data['subject']  =$request->get('subject');
     $data['message']  =$request->get('message');
     if($request->input('submit&send')){
               Contactus::dispatch($data);
               return Redirect()->back()->with('success_msg','Message Send Successfully.');
     }else{
        return redirect('/')->with('error_msg','Something is wrong please try again.');
     }
     
     
     
    }

}