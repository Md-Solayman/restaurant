<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\ProductGallery;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    public function productGallery($id)
    {
        try {
            $galleries = ProductGallery::where('product_id', $id)->orderBy('id', 'DESC')->get();

            return view('admin.product.gallery', [
                'id'       => $id,
                'galleries'     => $galleries,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function productGalleryStore(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,png|max:2000|file',
        ]);



        try {
            $imageProcess = Helper::image($request->image, '/uploads/product/gallery/');


            ProductGallery::create([
                'product_id'        => $id,
                'image'             => $imageProcess,
            ]);

            $notification = array(

                'message'           => 'Gallery Created',
                'alert-type'        => 'success',
            );


            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function productGalleryDestroy(ProductGallery $productgallery)
    {
        try {

            // remove previous image
            Helper::prevImage($productgallery->image, '/uploads/product/gallery/');

            $productgallery->delete();

            $notification = array(

                'message'           => 'Gallery Deleted',
                'alert-type'        => 'success',
            );


            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
