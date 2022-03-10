<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
class reviewController extends Controller
{
    

    public function storereview(Request $request){
        $data=array();
        $rating = $request->teacher_rating;
        
        $teacher_id = $request->teacher_id;
        if($rating<=3){
            
            $notification = array(
                'message' => 'Review must be more then 3 !!!.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }else{
        
            if (Auth::check()) {

                $existing_rating = DB::table('review')->where('user_id',Auth::id())->where('teacher_id',$teacher_id)->first();
                if($existing_rating)
                {
                    $notification = array(
                        'message' => 'review Already added!!!.',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);

                    
                }else{
                    $data=array();
                    $data['user_id']=Auth::id();
                    $data['teacher_id']=$teacher_id;
                    $data['review']=$rating;
                    $data['comment']=$request->comment;
                    $done = DB::table('review')->insert($data);

                }
                
                if ($done) {
                    $notification = array(
                        'message' => 'Thank you for review this service.',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    $notification = array(
                        'message' => 'review Added Unuccessfully',
                        'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);
                }
                    
            
            }else{
                $notification = array(
                    'message' => 'AT first login your account',
                    'alert-type' => 'warning'
                );
                return redirect()->route('login')->with($notification);
        }
      }
    }
}
