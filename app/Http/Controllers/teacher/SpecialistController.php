<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use DB;
use Illuminate\Support\Facades\Auth;
class SpecialistController extends Controller
{
    public function index(){
        $check = DB::table('users')->where('id',Auth::id())->where('user_status',1)->first();
        if($check ){
            return view('specialist.deshboard');
  
        }else{
            return view('specialist.pandingdeshboard');
        }
        
    }

    public function UpdateProfile(){
        $specialist = DB::table('users')->where('id',Auth::id())->first();   
        return  view('specialist.setting.edit',compact('specialist'));
    }


    
	public function Update(Request $request,$id){

		$data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['specialist_id']=$request->specialist_id;
        $data['details']=$request->details;
        $data['university_name']=$request->university_name;
        $data['degree']=$request->degree;
        $data['experience']=$request->experience;
        $data['subject']=$request->subject;
        $data['salary']=$request->salary;

        
        $image=$request->file('image');
            if ($image) {
                // $image_name= str_random(5);
                $image_name= date('dmy_H_s_i');

                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='media/category/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $data['image']=$image_url;
                $done=DB::table('users')->where('id',$id)->update($data);
                if ($done) {
                    $notification = array(
                        'message' => 'Teacher Profile Update Successfully.',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Teacher Profile Update Unuccessfully',
                        'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);
                }                    
            }else{
              
                $done=DB::table('users')->where('id',$id)->update($data);
                if ($done) {
                    $notification = array(
                        'message' => 'Teacher Profile Update Successfully.',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Teacher Profile Update Unuccessfully',
                        'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);
                }
            }

	}
}
