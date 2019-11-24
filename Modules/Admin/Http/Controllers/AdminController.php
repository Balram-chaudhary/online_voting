<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Auth;
use Session;
use Carbon\Carbon;
use Crypt;
use Validator;
use App\Admin;
use App\Voter;
use App\Nominee;
use App\Vote;
use File;
use Hash;
use Mail;
use App\Jobs\Createpassword;
use App\Mail\Createpasswordshipped;
class AdminController extends Controller
{
      public function __construct(){
        $this->middleware('auth:admin',['except'=>['index','authenticate','dashboard','logout','voterlist','voteredit','voteresult']]);
       
    }
     public function index()
    {
       
        if(Auth::guard('admin')->check()){
            return redirect('admin/dashboard');
        }
        $data=array();
         if(isset($_COOKIE['rem_e']) && $_COOKIE['rem_e'] != null && isset($_COOKIE['rem_p']) && $_COOKIE['rem_p'] != null){
        
            $data['u_e'] = $_COOKIE['rem_e'];
        
            // $data['u_p'] = Crypt::decrypt($_COOKIE['rem_p']);
           }
        $data['title']="Login Portal";
        $data['menu_active']='Admin';
        $data['submenu_active']='Admin';
        return view('admin::index',$data);
    }
    public function authenticate(Request $request){
     $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
     if (Auth::guard('admin')->attempt([
        'email'     => $request->email, 
        'password'  => $request->password,
     ]))
     { 
       
    
       if(Auth::guard('admin')->user()->status=='0'){
                Auth::guard('admin')->logout();
                Session::flash('error_message', 'This account has been deactivated!!. Please Contact with onlinevoting.com');
                return redirect('/admin');
            }

          if($request->input('remember_me')=="yes"){
              
                //setting cookie for a year
                setcookie("rem_e",$request->email,time()+31556926 ,'/');
                setcookie("rem_p",Crypt::encrypt($request->password),time()+31556926 ,'/');
                }else{
                unset($_COOKIE['rem_e']);
                unset($_COOKIE['rem_p']);
                setcookie('rem_e', null, -1, '/');
                setcookie('rem_p', null, -1, '/');
                }
      
             return redirect()->intended('admin/dashboard');
           
        }else{

               Session::flash('error_message', 'Invalid Email or Password.');
               return redirect('/admin'); 
        }

    }
    public function dashboard(){
       if(!Auth::guard('admin')->check()){
        Session::flash('error_message', 'OOps...Illegal Operation.Please Login.');
            return redirect('/admin');
        }
        if(Auth::guard('admin')->user()->status=='0'){
                Auth::guard('admin')->logout();
                Session::flash('error_message', 'This account has been deactivated!!. Please Contact with onlinevoting.com');
                return redirect('/admin');
            }
      $data['nominee']=Nominee::all();
      $data['voters']=Voter::all();        
      $data['title']='user';
      $data['menu_active']='user';
      $data['submenu_active']='user';
      return view('admin::dashboard',$data);
    }

    public function logout(){
       if(!Auth::guard('admin')->check()){
        Session::flash('error_message', 'OOps...Illegal Operation.Please Login.');
            return redirect('/admin');
        }
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
   
   public function voterlist()
  {
   if(Auth::guard('admin')){
    $data['menu_active']='voters';
    $data['submenu_active']='list';
     $data['voters']=Voter::orderBy('id', 'DESC')
                    ->paginate(15);
  return view('admin::voterlist',$data);
  }
 }
   
   public function voteredit(Request $request,$id)
{
   if(Auth::guard('admin')){
    if($request->isMethod('get')){
          $data['voter']=Voter::find($id);
          $data['menu_active']='voter';
          $data['submenu_active']='voteredit';
  return view('admin::voteredit',$data);
}
if($request->isMethod('post')){
         $rules=[
          'status'            =>'required',
                   ];
        $messages =[
            'status'                 =>'Status is required',
              
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('/admin/voter/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }

        $voter['status']=$request->get('status');
        $voter['updated_by'] =Auth::guard('admin')->user()->id;
        if($voter['status']=='v'){
          $data=Voter::find($id);
          if(Voter::find($id)->update($voter)){
              if($request->input('submit&update')){
                Createpassword::dispatch($data);
                Session::flash('success_msg', 'Voter Updated Successfully...');
                return redirect('/admin/voter/list');
        }   
     }

        }else{
          if(Voter::find($id)->update($voter)){
              if($request->input('submit&update')){

                Session::flash('success_msg', 'Voter Updated Successfully...');
                return redirect('/admin/voter/list');
        }   
     }
        }
        
     return back()->with('error_msg','Something is wrong!!');
  }
}
}

  
   public function voteresult()
  {
   if(Auth::guard('admin')){
    $data['menu_active']='vote';
    $data['submenu_active']='list';
    $data['president']=Nominee::where('post','p')
                               ->where('status','1')
                               ->get();                                  
    $data['vicepresident']=Nominee::where('post','v')
                               ->where('status','1')
                               ->get();
     $data['generalsecretary']=Nominee::where('post','gs')
                               ->where('status','1')
                               ->get();
     $data['deputygeneral']=Nominee::where('post','ds')
                               ->where('status','1')
                               ->get();
     $data['treasurer']=Nominee::where('post','t')
                               ->where('status','1')
                               ->get();
      $data['member']=Nominee::where('post','m')
                               ->where('status','1')
                               ->get();                                                                                                                                                                                                          
  return view('admin::voteresult',$data);
  }
 } 

}
