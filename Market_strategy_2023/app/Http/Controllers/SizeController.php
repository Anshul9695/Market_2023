<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sizeList()
    {
        $result['size'] = Size::all();
        return view('admin/sizeList', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_size(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Size::where(['id' => $id])->get();
            $result['id']=$arr[0]->id;
            $result['size']=$arr[0]->size;
            $result['status']=$arr[0]->status;
        } else {
            $result['id']=0;
            $result['size']='';
            $result['status']='';

        }
        return view('admin/manage_size',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_size_process(Request $request)
    {
        //    $result=$request->post();
        //    print_r($result);
        $request->validate([
            'size' => 'required|unique:sizes,size,'.$request->post('id'),
            'status' => 'required'
        ]);
        if($request->post('id')>0){
       $model=Size::find($request->post('id'));
       $message="Size Updated successfully..!!";
        }else{
            $model = new Size();
            $message="Size Inserted Successfully..!!";
        }
      
        $model->size = $request->post('size');
        $model->status = $request->post('status');
        $model->save();
        $request->session()->flash('message', $message);
        return redirect('admin/size/sizeList');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $model = Size::find($id);
        $model->delete();
        $request->session()->flash('message', 'Size Deleted Successfully..!!');
        return redirect('admin/size/sizeList');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request,$status,$id)
    {
        // echo "Status=:".$status."Id=:".$id;
        $model=Size::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Status Updated Successfully.. !!');
        return redirect('admin/size/sizeList');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        //
    }
}
