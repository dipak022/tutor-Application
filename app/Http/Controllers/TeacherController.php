<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Hash;
class TeacherController extends Controller
{
    public function teacheraccount(){
        return  view('specialist.create_teacher_account');
    }

    public function storeteacheraccount(Request $request){

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
        $data['roll_id']=3;
        $data['user_status']=1;
        $data['password']=Hash::make($request->password);

        
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
                $done = DB::table('users')->insert($data);
                if ($done) {
                    $notification = array(
                        'message' => 'Teacher Account Created Successfully.',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Teacher Account Created Unsuccessfully',
                        'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);
                }                    
            }else{
              
                $done = DB::table('users')->insert($data);
                if ($done) {
                    $notification = array(
                        'message' => 'Teacher Account Created Successfully.',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Teacher Account Created Unsuccessfully',
                        'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);
                }
            }

	}


    
}
