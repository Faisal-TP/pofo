<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use DB;

class admin extends Controller
{
    function adminLogin(Request $request){
        try {
            $uname=$request->input('username');
            $pwd=$request->input('password');
            $admin=DB::table('admin_login')
            ->where('username',$uname)
            ->first();
            if(is_null($admin)){
        	return redirect('pofoadmin')->with('errorMessage', 'Incorrect username or password');
            }
            elseif (($uname==$admin->username)&&($pwd==$admin->password)) {
            $request->session()->put('loginid',$admin->id);
            return redirect('adminHome');
        }
        else{
        	return redirect('pofoadmin')->with('errorMessage', 'Incorrect username or password');
        }
          }
          catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
          }
    }
    //Home page
    function adminHome(Request $request){
        //check session
        return view('admin.home');
    }
    //Customer registration
    function custmerRegistration(Request $request){
        try{
            $name = $request->cname;
            $date = $request->date;
            $place = $request->place;
            $eventtype=$request->eventtype;
            DB::table('customer')->insert(
                ['customer_name' => $name, 'date' => $date, 'event_type' => $eventtype, 'place' => $place, 'work_status' => 'Booked']
            );
            return redirect('customer');

            

        }
        catch(Exception $e){
            echo 'Message: ' .$e->getMessage();
        }
    }
    function showcustomer(){
        //Select registered detailes
        $customer = DB::table('customer')->get();
        return view('admin.cutomerManage',['cusomers'=>$customer]);
    }
    function deletecustomer($id){
        //delete customer
        DB::table('customer')->where('id', $id)->delete();
        return redirect('customer');
    }
    function uploadImages(Request $request){

        foreach ($request->file('images') as $imagefile) {
            echo "hiii";
            // return $imagefile->store('images','public');
         }

    }

}
