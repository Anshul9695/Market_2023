<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 return view('admin.login');
    }

    public function auth(Request $request)
    {
        // $result=$request->post();
        // print_r($result);
        $email=$request->post('email');
        $password=$request->post('password');
       $result=Admin::where(['email'=>$email])->first();
        //    echo "<pre>";
        //    print_r($result);
        //    die;
        if ($request) {
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return view('admin.dashboard');
            }else{
                $request->session()->flash('error','Please Enter Valid Password');
                return redirect('admin');
            }
        } else {
           $request->session()->flash('error','Please Enter the valid login Details !!');
           return redirect('admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin/dashboard');
    }
    public function updatepassword(){
        $getData=Admin::find(1);
        // echo "<pre>";
        // print_r($getData);
        // die;
        $getData->password=Hash::make('admin@123');
        $getData->save();
    }

}
