<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function index()
    {
        $result['data']=Catagory::all();
//         echo "<pre>";
// print_r($result);

        return view('admin/category',$result);
    }

    public function manage_category(Request $request,$id='')
    {
        if ($id > 0) {
            $arr = Catagory::where(['id' => $id])->get();
            $result['catagory_name'] = $arr[0]->catagory_name;
            $result['catagory_slug'] = $arr[0]->catagory_slug;
            $result['id'] = $arr[0]->id;
         
        } else {
            $result['catagory_name'] = '';
            $result['catagory_slug'] = '';
            $result['id'] =0;
        }
        // print_r($result);
        // die;
        return view('admin/manage_category',$result);
    }
    public function manage_category_process(Request $request)
    {
        // return $request->post();
        $request->validate([
            'catagory_name' => 'required',
            'catagory_slug' => 'required|unique:catagories,catagory_slug,' . $request->post('id'),
        ]);
        if ($request->post('id') > 0) {
            //data will be in update mode 
            $model = Catagory::find($request->post('id'));
            $msg = "Category Updated Successfully..";
        } else {
            //data will be in save mode
            $model = new Catagory();
            $msg = "Data Inserted Successfully..";
        }
   
    $model->catagory_name=$request->post('catagory_name');
    $model->catagory_slug=$request->post('catagory_slug');
    $model->save();
    $request->session()->flash('message',$msg);
    return redirect('admin/category');
    }

    public function delete(Request $request, $id)
    {
        $model = Catagory::find($id);
      $model->delete();
      $request->session()->flash('message','Catagory Deleted Successfully..');
      return redirect('admin/category');
   
    }
}
