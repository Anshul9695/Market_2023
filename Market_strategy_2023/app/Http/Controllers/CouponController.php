<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
   public function couponList(){
    $result['CouponList']=Coupon::all();
    return view('admin/couponList',$result);
    }
    public function manage_coupon(Request $request,$id='')
    {
        if ($id > 0) {
            // echo "data in edit mode";
            $arr = Coupon::where(['id' => $id])->get();
           $result['title']=$arr[0]->title;
           $result['coupon_code']=$arr[0]->coupon_code;
           $result['coupon_value']=$arr[0]->coupon_value;
           $result['type']=$arr[0]->type;
           $result['min_order_amt']=$arr[0]->min_order_amt;
           $result['is_one_time']=$arr[0]->is_one_time;
           $result['status']=$arr[0]->status;
           $result['id']=$arr[0]->id;
        } else {
           // echo "data in insert mode";
           $result['title']='';
           $result['coupon_code']='';
           $result['coupon_value']='';
           $result['type']='';
           $result['min_order_amt']='';
           $result['is_one_time']='';
           $result['status']='';
           $result['id']='';
        }
        return view('admin/manage_coupon',$result);
    }
    public function manage_coupon_process(Request $request){
    // $result=$request->post();
    // echo "<pre>";
    // print_r($result);
    $request->validate([
        'title'=>'required',
        'coupon_code'=>'required|unique:coupons,coupon_code,'.$request->post('id'),
        'coupon_value'=>'required',
        'min_order_amt'=>'required'  
    ]);
    if($request->post('id')>0){
    $model=Coupon::find($request->post('id'));
    $msg="Coupon Updated Successfully.. ";
    // echo "<pre>";
    // print_r($model);
    // echo "data in update mode";
    // die;
    }else{
        $model=new Coupon();
        $msg="Coupon Inserted successfully.. !!";
        // echo "<pre>";
        // print_r($model);
        // echo "data in insert Mode ";
    }

    $model->title=$request->post('title');
    $model->coupon_code=$request->post('coupon_code');
    $model->coupon_value=$request->post('coupon_value');
    $model->type=$request->post('type');
    $model->min_order_amt=$request->post('min_order_amt');
    $model->is_one_time=$request->post('is_one_time');
    $model->status=$request->post('status');
    $model->save();
    $request->session()->flash('message',$msg);
    return redirect('admin/coupon/couponList');
    }
    public function delete(Request $request,$id){
        $model=Coupon::find($id);
        $model->delete();
        $request->session()->flash("message","Coupon Deleted Successfully");
        return redirect('admin/coupon/couponList');
    //     // $model=Coupon::where(['id'=>$id])->get();
    //      echo "<pre>";
    //     // print_r($model);
    //    $model=Coupon::find($id);
    //    print_r($model);
    }
}
