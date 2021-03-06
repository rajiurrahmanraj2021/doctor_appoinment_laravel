<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Doctor;
use App\Appoinment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\AppoinmentDate;
use App\AppoinmentTime;
use App\Mail\ApproveMail;
use App\Mail\CancelMail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;

class DoctorController extends Controller
{
    public function myProfilePage(){

        $departments = DB::table('departments')->get();

        if(Doctor::where('user_id',Auth::user()->id)->exists()){
            $doctors_info = Doctor::where('user_id',Auth::user()->id)->first();
            $times = DB::table('appoinment_times')->where('doctor_id',Auth::user()->id)->get();
            return view('backend.doctor.my_profile',compact('departments','doctors_info','times'));
        }
        else{
            $doctors_info = null;
            return view('backend.doctor.my_profile',compact('departments','doctors_info'));
        }

    }

    public function updateDoctorInfo(Request $request){
        if(Doctor::where('user_id',Auth::user()->id)->exists()){
            if($image = $request->file('image')){

                $destinationPath = public_path().'/doctor_images/';
                $profileImage = str::random(5) . "-" . time() . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);

                Doctor::where('user_id',Auth::user()->id)->update([
                    'name'        => $request->name,
                    'user_id'     => Auth::user()->id,
                    'category_id' => $request->category_id,
                    'contact'     => $request->contact,
                    'nid'         => $request->nid,
                    'degree'      => $request->degree,
                    'sat'         => $request->sat,
                    'sun'         => $request->sun,
                    'mon'         => $request->mon,
                    'tue'         => $request->tue,
                    'wed'         => $request->wed,
                    'thu'         => $request->thu,
                    'fri'         => $request->fri,
                    'image'       => 'doctor_images/'.$profileImage,
                    'updated_at'  => Carbon::now(),
                ]);

                if(AppoinmentDate::where('doctor_id',Auth::user()->id)->exists()){
                    AppoinmentDate::where('doctor_id',Auth::user()->id)->delete();

                    if($request->sat != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Saturday",
                        ]);
                    }
                    if($request->sun != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Sunday",
                        ]);
                    }
                    if($request->mon != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Monday",
                        ]);
                    }
                    if($request->tue != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Tuesday",
                        ]);
                    }
                    if($request->wed != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Wednesday",
                        ]);
                    }
                    if($request->thu != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Thurseday",
                        ]);
                    }
                    if($request->fri != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Friday",
                        ]);
                    }
                }
                else{
                    if($request->sat != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Saturday",
                        ]);
                    }
                    if($request->sun != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Sunday",
                        ]);
                    }
                    if($request->mon != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Monday",
                        ]);
                    }
                    if($request->tue != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Tuesday",
                        ]);
                    }
                    if($request->wed != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Wednesday",
                        ]);
                    }
                    if($request->thu != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Thurseday",
                        ]);
                    }
                    if($request->fri != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Friday",
                        ]);
                    }
                }


                if(AppoinmentTime::where('doctor_id',Auth::user()->id)->exists()){
                    AppoinmentTime::where('doctor_id',Auth::user()->id)->delete();

                    if($request->time1 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "9-10 am",
                        ]);
                    }
                    if($request->time2 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "10-11 am",
                        ]);
                    }
                    if($request->time3 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "11-12 am",
                        ]);
                    }
                    if($request->time4 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "12-1 pm",
                        ]);
                    }
                    if($request->time5 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "1-2 pm",
                        ]);
                    }
                    if($request->time6 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "2-3 pm",
                        ]);
                    }
                    if($request->time7 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "3-4 pm",
                        ]);
                    }
                    if($request->time8 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "4-5 pm",
                        ]);
                    }
                    if($request->time9 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "5-6 pm",
                        ]);
                    }
                    if($request->time10 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "6-7 pm",
                        ]);
                    }
                    if($request->time11 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "7-8 pm",
                        ]);
                    }
                    if($request->time12 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "8-9 pm",
                        ]);
                    }

                }
                else{

                    if($request->time1 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "9-10 am",
                        ]);
                    }
                    if($request->time2 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "10-11 am",
                        ]);
                    }
                    if($request->time3 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "11-12 am",
                        ]);
                    }
                    if($request->time4 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "12-1 pm",
                        ]);
                    }
                    if($request->time5 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "1-2 pm",
                        ]);
                    }
                    if($request->time6 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "2-3 pm",
                        ]);
                    }
                    if($request->time7 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "3-4 pm",
                        ]);
                    }
                    if($request->time8 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "4-5 pm",
                        ]);
                    }
                    if($request->time9 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "5-6 pm",
                        ]);
                    }
                    if($request->time10 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "6-7 pm",
                        ]);
                    }
                    if($request->time11 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "7-8 pm",
                        ]);
                    }
                    if($request->time12 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "8-9 pm",
                        ]);
                    }
                }

                Toastr::success('Doctors Profile Updated Successfully', 'Success');
                return back();
            }
            else{
                Doctor::where('user_id',Auth::user()->id)->update([
                    'name'        => $request->name,
                    'user_id'     => Auth::user()->id,
                    'category_id' => $request->category_id,
                    'contact'     => $request->contact,
                    'nid'         => $request->nid,
                    'degree'      => $request->degree,
                    'sat'         => $request->sat,
                    'sun'         => $request->sun,
                    'mon'         => $request->mon,
                    'tue'         => $request->tue,
                    'wed'         => $request->wed,
                    'thu'         => $request->thu,
                    'fri'         => $request->fri,
                    'updated_at'  => Carbon::now(),
                ]);

                if(AppoinmentDate::where('doctor_id',Auth::user()->id)->exists()){
                    AppoinmentDate::where('doctor_id',Auth::user()->id)->delete();

                    if($request->sat != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Saturday",
                        ]);
                    }
                    if($request->sun != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Sunday",
                        ]);
                    }
                    if($request->mon != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Monday",
                        ]);
                    }
                    if($request->tue != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Tuesday",
                        ]);
                    }
                    if($request->wed != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Wednesday",
                        ]);
                    }
                    if($request->thu != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Thurseday",
                        ]);
                    }
                    if($request->fri != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Friday",
                        ]);
                    }
                }
                else{
                    if($request->sat != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Saturday",
                        ]);
                    }
                    if($request->sun != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Sunday",
                        ]);
                    }
                    if($request->mon != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Monday",
                        ]);
                    }
                    if($request->tue != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Tuesday",
                        ]);
                    }
                    if($request->wed != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Wednesday",
                        ]);
                    }
                    if($request->thu != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Thurseday",
                        ]);
                    }
                    if($request->fri != null){
                        AppoinmentDate::insert([
                            'doctor_id' => Auth::user()->id,
                            'date' => "Friday",
                        ]);
                    }
                }


                if(AppoinmentTime::where('doctor_id',Auth::user()->id)->exists()){
                    AppoinmentTime::where('doctor_id',Auth::user()->id)->delete();

                    if($request->time1 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "9-10 am",
                        ]);
                    }
                    if($request->time2 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "10-11 am",
                        ]);
                    }
                    if($request->time3 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "11-12 am",
                        ]);
                    }
                    if($request->time4 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "12-1 pm",
                        ]);
                    }
                    if($request->time5 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "1-2 pm",
                        ]);
                    }
                    if($request->time6 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "2-3 pm",
                        ]);
                    }
                    if($request->time7 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "3-4 pm",
                        ]);
                    }
                    if($request->time8 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "4-5 pm",
                        ]);
                    }
                    if($request->time9 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "5-6 pm",
                        ]);
                    }
                    if($request->time10 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "6-7 pm",
                        ]);
                    }
                    if($request->time11 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "7-8 pm",
                        ]);
                    }
                    if($request->time12 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "8-9 pm",
                        ]);
                    }

                }
                else{

                    if($request->time1 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "9-10 am",
                        ]);
                    }
                    if($request->time2 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "10-11 am",
                        ]);
                    }
                    if($request->time3 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "11-12 am",
                        ]);
                    }
                    if($request->time4 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "12-1 pm",
                        ]);
                    }
                    if($request->time5 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "1-2 pm",
                        ]);
                    }
                    if($request->time6 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "2-3 pm",
                        ]);
                    }
                    if($request->time7 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "3-4 pm",
                        ]);
                    }
                    if($request->time8 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "4-5 pm",
                        ]);
                    }
                    if($request->time9 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "5-6 pm",
                        ]);
                    }
                    if($request->time10 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "6-7 pm",
                        ]);
                    }
                    if($request->time11 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "7-8 pm",
                        ]);
                    }
                    if($request->time12 != null){
                        AppoinmentTime::insert([
                            'doctor_id' => Auth::user()->id,
                            'time' => "8-9 pm",
                        ]);
                    }
                }

                Toastr::success('Doctors Profile Updated Successfully', 'Success');
                return back();
            }
        }
        else{
            if($image = $request->file('image')){

                $destinationPath = public_path().'/doctor_images/';
                $profileImage = str::random(5) . "-" . time() . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);

                Doctor::where('user_id',Auth::user()->id)->insert([
                    'name'        => $request->name,
                    'user_id'     => Auth::user()->id,
                    'category_id' => $request->category_id,
                    'contact'     => $request->contact,
                    'nid'         => $request->nid,
                    'degree'      => $request->degree,
                    'sat'         => $request->sat,
                    'sun'         => $request->sun,
                    'mon'         => $request->mon,
                    'tue'         => $request->tue,
                    'wed'         => $request->wed,
                    'thu'         => $request->thu,
                    'fri'         => $request->fri,
                    'image'       => 'doctor_images/'.$profileImage,
                    'created_at'  => Carbon::now(),
                ]);

                if($request->sat != null){
                    AppoinmentDate::insert([
                        'doctor_id' => Auth::user()->id,
                        'date' => "Saturday",
                    ]);
                }
                if($request->sun != null){
                    AppoinmentDate::insert([
                        'doctor_id' => Auth::user()->id,
                        'date' => "Sunday",
                    ]);
                }
                if($request->mon != null){
                    AppoinmentDate::insert([
                        'doctor_id' => Auth::user()->id,
                        'date' => "Monday",
                    ]);
                }
                if($request->tue != null){
                    AppoinmentDate::insert([
                        'doctor_id' => Auth::user()->id,
                        'date' => "Tuesday",
                    ]);
                }
                if($request->wed != null){
                    AppoinmentDate::insert([
                        'doctor_id' => Auth::user()->id,
                        'date' => "Wednesday",
                    ]);
                }
                if($request->thu != null){
                    AppoinmentDate::insert([
                        'doctor_id' => Auth::user()->id,
                        'date' => "Thurseday",
                    ]);
                }
                if($request->fri != null){
                    AppoinmentDate::insert([
                        'doctor_id' => Auth::user()->id,
                        'date' => "Friday",
                    ]);
                }


                if($request->time1 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "9-10 am",
                    ]);
                }
                if($request->time2 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "10-11 am",
                    ]);
                }
                if($request->time3 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "11-12 am",
                    ]);
                }
                if($request->time4 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "12-1 pm",
                    ]);
                }
                if($request->time5 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "1-2 pm",
                    ]);
                }
                if($request->time6 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "2-3 pm",
                    ]);
                }
                if($request->time7 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "3-4 pm",
                    ]);
                }
                if($request->time8 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "4-5 pm",
                    ]);
                }
                if($request->time9 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "5-6 pm",
                    ]);
                }
                if($request->time10 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "6-7 pm",
                    ]);
                }
                if($request->time11 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "7-8 pm",
                    ]);
                }
                if($request->time12 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "8-9 pm",
                    ]);
                }

                Toastr::success('Doctors Profile Created Successfully', 'Success');
                return back();
            }
            else{
                Doctor::where('user_id',Auth::user()->id)->insert([
                    'name'        => $request->name,
                    'user_id'     => Auth::user()->id,
                    'category_id' => $request->category_id,
                    'contact'     => $request->contact,
                    'nid'         => $request->nid,
                    'degree'      => $request->degree,
                    'sat'         => $request->sat,
                    'sun'         => $request->sun,
                    'mon'         => $request->mon,
                    'tue'         => $request->tue,
                    'wed'         => $request->wed,
                    'thu'         => $request->thu,
                    'fri'         => $request->fri,
                    'created_at'  => Carbon::now(),
                ]);

                if($request->sat != null){
                    AppoinmentDate::insert([
                        'doctor_id' => Auth::user()->id,
                        'date' => "Saturday",
                    ]);
                }
                if($request->sun != null){
                    AppoinmentDate::insert([
                        'doctor_id' => Auth::user()->id,
                        'date' => "Sunday",
                    ]);
                }
                if($request->mon != null){
                    AppoinmentDate::insert([
                        'doctor_id' => Auth::user()->id,
                        'date' => "Monday",
                    ]);
                }
                if($request->tue != null){
                    AppoinmentDate::insert([
                        'doctor_id' => Auth::user()->id,
                        'date' => "Tuesday",
                    ]);
                }
                if($request->wed != null){
                    AppoinmentDate::insert([
                        'doctor_id' => Auth::user()->id,
                        'date' => "Wednesday",
                    ]);
                }
                if($request->thu != null){
                    AppoinmentDate::insert([
                        'doctor_id' => Auth::user()->id,
                        'date' => "Thurseday",
                    ]);
                }
                if($request->fri != null){
                    AppoinmentDate::insert([
                        'doctor_id' => Auth::user()->id,
                        'date' => "Friday",
                    ]);
                }

                if($request->time1 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "9-10 am",
                    ]);
                }
                if($request->time2 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "10-11 am",
                    ]);
                }
                if($request->time3 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "11-12 am",
                    ]);
                }
                if($request->time4 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "12-1 pm",
                    ]);
                }
                if($request->time5 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "1-2 pm",
                    ]);
                }
                if($request->time6 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "2-3 pm",
                    ]);
                }
                if($request->time7 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "3-4 pm",
                    ]);
                }
                if($request->time8 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "4-5 pm",
                    ]);
                }
                if($request->time9 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "5-6 pm",
                    ]);
                }
                if($request->time10 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "6-7 pm",
                    ]);
                }
                if($request->time11 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "7-8 pm",
                    ]);
                }
                if($request->time12 != null){
                    AppoinmentTime::insert([
                        'doctor_id' => Auth::user()->id,
                        'time' => "8-9 pm",
                    ]);
                }

                Toastr::success('Doctors Profile Created Successfully', 'Success');
                return back();
            }
        }
    }

    public function getRecentApprovedList(){
        $date = date('Y-m-d H:i:s');
        $current_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
        $details = Appoinment::where('doctor_id',Auth::user()->id)->where('status',1)->where('appoinment_date','>=',$current_date)->orderBy('appoinment_date','asc')->paginate(15);
        return view('backend.doctor.recent_approved',compact('details'));
    }

    public function deleteRecentApproved($id){
        Appoinment::where('slug',$id)->delete();
        Toastr::error('Appoinment has been deleted', 'Deleted Successfully');
        return back();
    }

    public function pendingListAppoinment(){
        $date = date('Y-m-d H:i:s');
        $current_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
        $details = Appoinment::where('doctor_id',Auth::user()->id)->where('status',0)->where('appoinment_date','>=',$current_date)->orderBy('appoinment_date','asc')->paginate(15);
        return view('backend.doctor.pending_appoinments',compact('details'));
    }

    public function approvePendingAppoinment($id){
        Appoinment::where('slug',$id)->update([
            'status' => 1,
            'updated_at' => Carbon::now()
        ]);

        $data = Appoinment::where('slug',$id)->first();
        Mail::to($data->email)->send(new ApproveMail($data));

        Toastr::success('Appoinment has been Approved', 'Approved Successfully');
        return back();
    }

    public function cancelPendingAppoinment($id){
        $data = Appoinment::where('slug',$id)->first();
        Mail::to($data->email)->send(new CancelMail($data));

        Appoinment::where('slug',$id)->delete();

        Toastr::error('Appoinment has been Cancelled', 'Cancelled Successfully');
        return back();
    }

    public function prevApprovedAppoinments(){
        $date = date('Y-m-d H:i:s');
        $current_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
        $details = Appoinment::where('doctor_id',Auth::user()->id)->where('status',1)->where('appoinment_date','<',$current_date)->orderBy('appoinment_date','asc')->paginate(15);
        return view('backend.doctor.previous_approved',compact('details'));
    }

    public function deletePrevApprovedAppoinments($id){
        Appoinment::where('slug',$id)->delete();
        Toastr::error('Appoinment has been deleted', 'Deleted Successfully');
        return back();
    }

    public function cancelledAppoinment(){
        $date = date('Y-m-d H:i:s');
        $current_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
        $details = DB::table('appoinments')->where('doctor_id',Auth::user()->id)->where('status',0)->where('appoinment_date','<',$current_date)->orderBy('appoinment_date','asc')->paginate(15);
        return view('backend.doctor.cancelled_appoinments',compact('details'));
    }

    public function deleteCancelledAppoinment($id){
        Appoinment::where('slug',$id)->delete();
        Toastr::error('Appoinment has been deleted', 'Deleted Successfully');
        return back();
    }
}
