<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cate = Category::All();
        return view('admin.category',compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.addCate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:100|unique',
        ]);
        $cate = new Category();
        $cate->name = $request->name;
        $cate->status = $request->status;
        $cate->save();
        return redirect()->route('cate')->with('thongbao','Thanh cong!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cate = Category::find($id);
        return view('admin.editCate',compact('cate')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cate = Category::find($id);
        $validatedData = $request->validate([
            'name' => 'required|max:100',
        ]);
        $cate->name=$request->name;
        $cate->status=$request->status;
        $cate->update();
        return redirect()->route('cate')->with('thongbao','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cate = Category::destroy($id);
        return back()->with('thongbao','Xóa thành công');
    }
    public function active($id){
        $cate = Category::where('id',$id)->update(['status'=>1]);
        return back()->with('thongbao','Thành công!');
    }
    public function unactive($id){
        $cate = Category::where('id',$id)->update(['status'=>0]);
        return back()->with('thongbao','Thành công!');
    }
}
