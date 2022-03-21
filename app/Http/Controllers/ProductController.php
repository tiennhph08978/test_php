<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pro = Product::all();
        return view('admin.product',compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $cate = DB::table('categories')->where('status', 1);
        $cate = Category::all();
        return view('admin.addPro',compact('cate'));
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
            'price' => 'required|max:100',
            'amount' => 'required|max:100',
            'image' => 'required',
        ]);
        $pro = new Product();
        $pro->name=$request->name;
        $pro->cate_id=$request->cate_id;
        $pro->price=$request->price;
        $pro->amount=$request->amount;

        $image = $request->file('image');
        $namewithextension = $image->getClientOriginalName(); //Name with extension 'filename.jpg'
        $fileName = explode('.', $namewithextension)[0]; // Filename 'filename'
        // var_dump($fileName);
        $name = $fileName . '-' . time() .'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/upload/avatar');

    
        $image->move($destinationPath, $name);
        $pro->image = $name;
        $pro->status=$request->status;
        $pro->save();
        return redirect()->route('product')->with('thongbao','Thêm thành công');
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
        $cate = Category::all();
        $pro = Product::find($id);
        return view('admin.editPro',compact('cate','pro'));
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
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|max:100',
            'amount' => 'required|max:100',
            'image' => 'required',
        ]);
        $pro = Product::find($id);
        $pro->name = $request->name;
        $pro->cate_id=$request->cate_id;
        $pro->price=$request->price;
        $pro->amount=$request->amount;

        $image = $request->file('image');
        $namewithextension = $image->getClientOriginalName(); //Name with extension 'filename.jpg'
        $fileName = explode('.', $namewithextension)[0]; // Filename 'filename'
        // var_dump($fileName);
        $name = $fileName . '-' . time() .'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/upload/avatar');

    
        $image->move($destinationPath, $name);
        $pro->image = $name;
        $pro->status=$request->status;
        $pro->update();
        return redirect()->route('product')->with('thongbao','Sửa thành công');

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
        Product::destroy($id);
        return back()->with('thongbao','Xóa thành công');
    }
    public function active($id){
        $pro = Product::where('id',$id)->update(['status'=>1]);
        return back()->with('thongbao','Thành công!');
    }
    public function unactive($id){
        $pro = Product::where('id',$id)->update(['status'=>0]);
        return back()->with('thongbao','Thành công!');
    }
}
