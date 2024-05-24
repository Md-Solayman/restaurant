<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductOption;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{


    public function productOption($id)
    {
        try {
            $options = ProductOption::where('product_id', $id)->orderBy('id', 'DESC')->get();

            return view('admin.product.option', [
                'id'        => $id,
                'options'  => $options,

            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function productOptionStore(Request $request, $id)
    {


        $request->validate([
            'name'   => 'required',
            'price'  => 'required',
        ]);


        try {
            ProductOption::create([
                'product_id'    => $id,
                'name'          => $request->name,
                'price'         => $request->price,
            ]);

            $notification = array(
                'message'           => 'Created Successfully',
                'alert-type'        => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function productOptionDestroy(ProductOption $productoption)
    {
        try {

            $productoption->delete();


            $notification = array(
                'message'           => 'Deleted Successfully',
                'alert-type'        => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
