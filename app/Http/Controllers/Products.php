<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Products extends Controller
{
    public function index()
    {
        $products = ProductsModel::all();

        return view('product.index', compact('products'));
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // dd(122);
    //   dd( $request->input('name'));
        $request->validate([
            'name' => 'required',
            'book_id' => 'required',
            'author' => 'required',
            'category' => 'required',
            'number_page' => 'required',
            'year' => 'required',
        ],[
            'name.required' => 'Bạn chưa nhập Tên',
            'book_id.required' => 'Bạn chưa nhập ISBN',
            'author.required' => 'Bạn chưa nhập tác giả',
            'category.required' => 'Bạn chưa nhập thể loại',
            'number_page.required' => 'Bạn chưa nhập số trang',
            'year.required' => 'Bạn chưa nhập năm xuất bản',
        ]);

        $product_model = new ProductsModel();
        $product_model->name = $request->input('name');
        $product_model->book_id = $request->input('book_id');
        $product_model->author = $request->input('author');
        $product_model->category = $request->input('category');
        $product_model->number_page = $request->input('number_page');
        $product_model->year = $request->input('year');
       
        $product_model->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới thành công');
        //tao moi xong quay ve trang danh sach product_model
        return redirect()->route('product.index');
    }
    public function edit($id)
    {
        $product_models = ProductsModel::findOrFail($id);
        return view('product.edit', compact('product_models'));
    }

    public function update(Request $request, $id)
    {
        $product_model = ProductsModel::findOrFail($id);
        $product_model->name = $request->input('name');
        $product_model->book_id = $request->input('book_id');
        $product_model->author = $request->input('author');
        $product_model->category = $request->input('category');
        $product_model->number_page = $request->input('number_page');
        $product_model->year = $request->input('year');
        $product_model->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach product_model
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = ProductsModel::findOrFail($id);
        $product->destroy($id);
        // return response()->json(['product' => 'delete successFully']);
        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach product_model
        return redirect()->route('product.index');
    }
}
