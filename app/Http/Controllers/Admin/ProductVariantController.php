<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductOption;
use App\Models\Admin\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function productVariant($id)
    {
        try {
            $variants = ProductVariant::where('product_id', $id)->orderBy('id', 'DESC')->get();

            return view('admin.product.variant', [
                'id'        => $id,
                'variants'  => $variants,

            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function productVariantStore(Request $request, $id)
    {
        $request->validate([
            'size_name' => 'required',
            'price'     => 'required',
        ]);


        try {
            ProductVariant::create([
                'product_id'    => $id,
                'size_name'     => $request->size_name,
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


    public function productVariantDestroy(ProductVariant $productvariant)
    {
        try {

            $productvariant->delete();


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
