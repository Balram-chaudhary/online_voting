<?php

namespace Modules\Voter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Auth;
use Session;
use Carbon\Carbon;
use Crypt;
use Validator;
use App\Voter;
use App\Nominee;
use App\Vote;
use File;
use Hash;
use DB;
use Dcrypt;
use App\Jobs\Createpassword;
use App\Mails\Createpasswordshipped;
use Notification;
use App\Notifications\RepliedToThread;
class VoterController extends Controller
{
     public function __construct(){
        $this->middleware('auth:voter',['except'=>['index','authenticate','dashboard','register','logout','register','createpassword','createpasswordpost','profile','profileedit']]);
       }

       public function index()
     {
        if(Auth::guard('voter')->check()){
            return redirect('voter/dashboard');
        }
        $data=array();
         if(isset($_COOKIE['rem_e']) && $_COOKIE['rem_e'] != null && isset($_COOKIE['rem_p']) && $_COOKIE['rem_p'] != null){
        
            $data['u_e'] = $_COOKIE['rem_e'];
        
             $data['u_p'] = Crypt::decrypt($_COOKIE['rem_p']);
           }
        $data['title']="Login Portal";
        $data['menu_active']='voter';
        $data['submenu_active']='voter';
        return view('voter::index',$data);
    }
    public function authenticate(Request $request){
     $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

     if (Auth::guard('voter')->attempt([
        'email'     => $request->email, 
        'password'  => $request->password,
     ])) 
     {
       if(Auth::guard('voter')->user()->status=='u' || Auth::guard('voter')->user()->status=='b'){
                Auth::guard('voter')->logout();
                Session::flash('error_message', 'This account has been deactivated!!. Please Contact with Onlinevoting.com');
                return redirect('/voter');
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
              return redirect()->intended('voter/dashboard');
           
        }else{

               Session::flash('error_message', 'Invalid Email or Password.');
               return redirect('/voter'); 
        }

    }
    public function dashboard(){
      if(!Auth::guard('voter')->check()){
        Session::flash('error_message', 'Opps Illegal operation..Plese Login.');
             return redirect('/voter');
           }
           if(Auth::guard('voter')->user()->status=='u' || Auth::guard('voter')->user()->status=='b'){
                Auth::guard('voter')->logout();
                Session::flash('error_message', 'This account has been deactivated!!. Please Contact with onlinevoting.com');
                return redirect('/voter');
            }
      $data['title']='voter';
      $data['menu_active']='voter';
      $data['submenu_active']='voter';
      return view('voter::dashboard',$data);
    }

     public function logout(){
      if(!Auth::guard('voter')->check()){
        Session::flash('error_message', 'Opps Illegal operation..Plese Login.');
             return redirect('/voter');
           }
        Auth::guard('voter')->logout();
        return redirect('/voter');
    }

    public function register(Request $request)
    {
      if(Auth::guard('voter')){
        if($request->isMethod('get')){
        return view('voter::register');
     }

     if($request->isMethod('post')){
      
    $rules=[
    'name'         =>'required',   
    'email'        =>'required|unique:voters',
    'phone'        =>'required|digits:10',
    'licence'      =>'required',
    'state'        =>'required',
    'address'      =>'required',
    'images'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
    'limages'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
             ];
        $messages =[
            'name.required'        =>'Username is required',
            'email.required'       =>'Email is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'The email ID you entered already exist',
            'phone.required'       =>'Phone is required',
            'licence.required'     =>'Licence Id is required',
            'state.required'       =>'State is required',
            'address.required'     =>'Address is required',
            'images.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 800kb',
            'limages.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'limages.size'     =>'Image size not exceed to be 800kb',
            // 'images.dimensions'     =>'Image width may be 200 and height may be 250 ', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('/voter/register')
                        ->withErrors($validator)
                        ->withInput();               
        }
         $voter['name']  =$request->get('name');
         $voter['email']    =$request->get('email');
         $voter['phone']    =$request->get('phone');
         $voter['licence_number']=$request->get('licence');
         $voter['state']     =$request->get('state');
         $voter['address']   =$request->get('address');
         $voter['status']     ='u';
          if($request->hasFile('images')){
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            
         }
         $voter['image']=$image_filename;
          if($request->hasFile('images')){
            $limages=$request->file('limages');
            $limage_upload_path=public_path('/images/');
            $limage_file_extension=$limages->getClientOriginalExtension();
            $limage_filename  = time() . '-' .rand(111111,999999).'.'.$limages->getClientOriginalExtension();
            $limages->move($limage_upload_path,$limage_filename);
            
         }
         $voter['licence_image']=$limage_filename;

         
        if($data=Voter::create($voter)){
              if($request->input('submit&create')){
                 $voter['id']=$data->id;   
                  Createpassword::dispatch($voter);
                // admin notification
                if(Auth::guard('admin')->user()){
                  Auth::guard('admin')->user()->notify(new RepliedToThread($voter));     
                }else{
                  Auth()->user()->notify(new RepliedToThread($voter));
                }
             
                  
                  
               return redirect('/voter/register')->with('success_msg','Register Successfully!!Our admin verify  your data.Please check your email.After verification we send you password create link in your email.Your username is your email.Thanks for Register in Onlinevoting.com.');
        }   
     }else{
        return redirect('/voter/register')->with('error_msg','Register failed!!Please Try Again.');
     }
   }
 }else{
        return redirect('/voter');
     }  
    }

    public function createpassword($id)
   {
     if(Auth::guard('voter')){
        $data['id']=Crypt::decryptString($id);
      return view('voter::createpassword',$data);
     }
    
   }
   public function createpasswordpost(Request $request){
         $rules=[
           'password' => 'required|confirmed|min:6', 
                   ];
        $messages =[
            'password.required'     =>'Password is required',
            'cpassword'             =>'Confirm password is required',
              
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('/voter/create-password/'.Crypt::encryptString($request->get('voter_id')))
                        ->withErrors($validator)
                        ->withInput();               
        }
        $voter['password']=bcrypt($request->get('password'));
        if(Voter::find($request->get('voter_id'))->update($voter)){
              if($request->input('submit&update')){
               Auth::guard('voter')->logout();
                Session::flash('success_msg', 'Password  Create Successfully. Please login when we verify your account.Username is your Email Address and password is recently created password.If you have trouble in login please contact us ovoting.triporbitz.com .');
                return redirect('/voter');
        }   
     }
     return back()->with('error_msg','Something is wrong!!');

   }

public function vote(Request $request)
    {
      if(Auth::guard('voter')){
        if($request->isMethod('get')){
            $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('voter.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('voter.vote').'">Vote</a></li>';
          $data['menu_active']='vote';
          $data['submenu_active']='add';
          $data['president']=Nominee::where('status','=','1')
                                      ->where('post','=','p')  
                                      ->get();
          $data['vicepresident']=Nominee::where('status','=','1')
                                      ->where('post','=','v')  
                                      ->get();
           $data['generalsecretary']=Nominee::where('status','=','1')
                                      ->where('post','=','gs')  
                                      ->get();
           $data['deputygeneral']=Nominee::where('status','=','1')
                                      ->where('post','=','ds')  
                                      ->get();
           $data['treasurer']=Nominee::where('status','=','1')
                                      ->where('post','=','t')  
                                      ->get();
           $data['member']=Nominee::where('status','=','1')
                                      ->where('post','=','m')  
                                      ->get();                          
        return view('voter::vote',$data);
     }

     if($request->isMethod('post')){
    $rules=[
    'president'         =>'required',   
    'vicepresident'     =>'required',
    'generalsecretary'  =>'required',
    'deputygeneral'     =>'required',
    'treasurer'         =>'required',
    'member'            =>'required',

             ];
        $messages =[
            'president.required'        =>'president is required',
            'vicepresident.required'       =>'Vicepresident is required',
            'generalsecretary.required' => 'General Secretary is required',
            'deputygeneral.required' => 'Deputy General is required',
            'treasurer.required'       =>'Treasurer is required',
            'member.required'     =>'Member is required', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('/voter/vote')
                        ->withErrors($validator)
                        ->withInput();               
        }
         $voter['president']  =$request->get('president');
         $voter['vicepresident']    =$request->get('vicepresident');
         $voter['generalsecretary']    =$request->get('generalsecretary');
         $voter['deputygeneral']=$request->get('deputygeneral');
         $voter['treasurer']     =$request->get('treasurer');
         $voter['member']   =$request->get('member');
         $id=Auth::guard('voter')->user()->id;
              if($request->input('submit&vote')){
                Vote::create($voter);
                $data['status']='vc';
               Voter::find($id)->update($data);
               Auth::guard('voter')->logout();
               return redirect('/voter')->with('success_msg','Thanks for Your Vote Please Login Again to view or edit your profile.');

               
        }   
    
   }
 }else{
        return redirect('/voter');
     }  
    }


public function profile(){
    if(Auth::guard('voter')){
    $id=Auth::guard('voter')->user()->id;
    $data['profile']=Voter::find($id);
    $data['title']="Profile";
    $data['menu_active']='profile';
    $data['submenu_active']='list';
    return view('voter::profile',$data);
  } 
}

public function profileedit(Request $request){
        if(Auth::guard('voter')){
        if($request->isMethod('get')){
          $data=[];
          $id=Auth::guard('voter')->user()->id;
          $data['profile'] =Voter::find($id);
          $data['menu_active']='profile';
          $data['submenu_active']='profileedit';
          return view('voter::profileedit',$data);
     }
    if($request->isMethod('post')){

    $rules=[
    'uname'          =>'required',
    'contact'          =>'required|digits:10',
    'address'         =>'required',
    'images'    => 'mimes:jpeg,png,bmp,gif,jpg|max:200',
     ];
        $messages =[
           'uname.required'      =>'Username  is required',
            'contact.required'      =>'Contact is required',
            'address.required'     =>'Address is required',
            'images.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb',
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('/voter/profile/edit')
                        ->withErrors($validator)
                        ->withInput();               
        }
        
           $profile['name']    =$request->get('uname');
         if($request->hasFile('images')){
              File::delete('/images/'.$request->input('old_profile_image'));
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            $profile['image']=$image_filename;  
            }else{
            $profile['image']=$request->input('old_profile_image');

           } 
         $profile['phone']      =$request->get('contact');
         $profile['address']     =$request->get('address');
         $profile['updated_by'] =Auth::guard('voter')->user()->id;
        if(Voter::find($request->get('profile_id'))->update($profile)){
              if($request->input('submit&update')){
               return redirect('/voter/profile/edit')->with('success_msg','profile Updated Successfully!!'); 
         }
               
        }   
     }
     return back()->with('error_msg','Something is wrong!!');

   
 }else{
        return redirect('/voter');
     }  

  
}


public function changepassword(Request $request)
{
   if(Auth::guard('voter')){
    if($request->isMethod('get')){
          $data['menu_active']='profile';
          $data['submenu_active']='changepassword';
  return view('voter::changepassword',$data);
}
if($request->isMethod('post')){
         $rules=[
          'password'          =>'required'
                   ];
        $messages =[
            'password.required'      =>'Password is required',
              
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('/voter/profile/change-password')
                        ->withErrors($validator)
                        ->withInput();               
        }

if(Hash::check($request->password,Auth::guard('voter')->user()->password)==true)
    {
        return redirect('/voter/profile/new-password');
      }else{
        Session::flash('error_msg', 'OOps..Your  Current Password Is Incorrect..');
        return redirect('/voter/profile/change-password');
      }

}

}
}

public function newpassword(Request $request)
{
   if(Auth::guard('voter')){
    if($request->isMethod('get')){
          $data['menu_active']='profile';
          $data['submenu_active']='changepassword';
  return view('voter::newpassword',$data);
}
if($request->isMethod('post')){
         $rules=[
           'password' => 'required|confirmed|min:6', 
                   ];
        $messages =[
            'password.required'     =>'Password is required',
            'cpassword'             =>'Confirm password is required',
              
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('/voter/profile/new-password')
                        ->withErrors($validator)
                        ->withInput();               
        }
        $userid=Auth::guard('voter')->user()->id;
        $profile['password']=bcrypt($request->get('password'));
        $profile['updated_by'] =Auth::guard('voter')->user()->id;
        if(Voter::find($userid)->update($profile)){
              if($request->input('submit&update')){
               Auth::guard('voter')->logout();
                Session::flash('success_msg', 'Password  has been Changed Successfully. Please Login with new Credentials.');
                return redirect('/voter');
        }   
     }
     return back()->with('error_msg','Something is wrong!!');

   }
 }else{
        return redirect('/voter');
     }  

}






   
}
