<?php

namespace Modules\Nominee\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\Nominee;
use File;
use Session;
use Auth;
use DB;
class NomineeController extends Controller
{
     public function create(Request $request)
    {
     if(Auth::guard('admin')){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('nominee.create').'">Nominee Create</a></li>';
          $data['menu_active']='nominee';
          $data['submenu_active']='add';
          return view('nominee::index',$data);
     }
     if($request->isMethod('post')){
    $rules=[
    'name'         =>'required',   
    'pname'        =>'required',
    'licence'      =>'required',
    'post'         =>'required',
    'state'        =>'required',
    'address'      =>'required',
    'status'       =>'required',
    'images'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
             ];
        $messages =[
            'name.required'        =>'nominee name is required',
            'pname.required'       =>'Party  Name is required',
            'licence.required'     =>'Licence Id is required',
            'post.required'        =>'Post is required',
            'state.required'       =>'State is required',
            'address.required'     =>'Address is required',
            'images.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 800kb',
            // 'images.dimensions'     =>'Image width may be 200 and height may be 250 ', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('/admin/nominee/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
         $nominee['name']  =$request->get('name');
         $nominee['party_name']    =$request->get('pname');
         $nominee['licence_id']=$request->get('licence');
         $nominee['post']      =$request->get('post');
         $nominee['state']     =$request->get('state');
         $nominee['address']   =$request->get('address');
         $nominee['status']     =$request->get('status');
         $nominee['created_by'] =Auth::guard('admin')->user()->id;
          if($request->hasFile('images')){
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            
         }
         $nominee['image']=$image_filename;

         
        if(Nominee::create($nominee)){
              if($request->input('submit&create')){
               return redirect('/admin/nominee/create')->with('success_msg','Nominee Created Successfully!!');
        }   
     }else{
        return redirect('/admin/nominee/create')->with('error_msg','Nominee Not Created');
     }
   }
 }else{
        return redirect('/admin');
     }   
     
  }


   public function list(){
    if(Auth::guard('admin')){
          $data=[];
          $data['breadcrumbs'] ='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('nominee.list').'">Nominee List</a></li>';
          $data['nominee'] =   Nominee::paginate(20);
          $data['menu_active']='products';
          $data['submenu_active']='list';
              return view('nominee::nomineelist',$data);
     }else{
        return redirect('/admin');
     }      
    }
  

public function edit(Request $request ,$id){
        if(Auth::guard('admin')){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.url('admin/nominee/edit/'.$id).'">Nominee Edit</a></li>';
          $data['nominee'] =Nominee::find($id);
          $data['menu_active']='nominee';
          $data['submenu_active']='nomineeedit';
          return view('nominee::nomineeedit',$data);
     }
    if($request->isMethod('post')){
     $rules=[
    'name'         =>'required',   
    'pname'        =>'required',
    'licence'      =>'required',
    'post'         =>'required',
    'state'        =>'required',
    'address'      =>'required',
    'status'       =>'required',
    'images'       => 'mimes:jpeg,png,bmp,gif,jpg|max:800',
             ];
        $messages =[
            'name.required'        =>'nominee name is required',
            'pname.required'       =>'Party  Name is required',
            'licence.required'     =>'Licence Id is required',
            'post.required'        =>'Post is required',
            'state.required'       =>'State is required',
            'address.required'     =>'Address is required',
            'images.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 800kb',
            // 'images.dimensions'     =>'Image width may be 200 and height may be 250 ', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('/admin/nominee/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         $nominee['name']  =$request->get('name');
         $nominee['party_name']    =$request->get('pname');
         $nominee['licence_id']=$request->get('licence');
         $nominee['post']      =$request->get('post');
         $nominee['state']     =$request->get('state');
         $nominee['address']   =$request->get('address');
         $nominee['status']     =$request->get('status');
         if($request->hasFile('images')){
              File::delete('/images/'.$request->input('old_nominee_image'));
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            $nominee['image']=$image_filename;  
            }else{
            $nominee['image']=$request->input('old_nominee_image');

           }
         $nominee['updated_by'] =Auth::guard('admin')->user()->id;

        if(Nominee::find($request->get('nominee_id'))->update($nominee)){
              if($request->input('submit&update')){
               return redirect('admin/nominee/list')->with('success_msg','Nominee Updated Successfully!!');
        }   
     }
     return back()->with('error_msg','Something is wrong!!');

   }
 }else{
        return redirect('/admin');
     }  

  
}

public function remove($id){
    if(Auth::guard('admin')){
       $data=[];
        $data['deleted_by']=Auth::guard('admin')->user()->id;
        $data['deleted_at']=date('Y-m-d h:i:s');
        $data['status']='0';
        if(Nominee::find($id)->update($data)){
            return redirect('admin/nominee/list')->with('success_msg','Deleted Successfully!!');
        }
     }else{
      return redirect('admin');
     }    
        
  }
    
}
