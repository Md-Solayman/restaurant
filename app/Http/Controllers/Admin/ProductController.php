<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Helpers\NaimImage;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\ProductGallery;
use App\Models\Admin\ProductOption;
use App\Models\Admin\ProductVariant;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::orderBy('id', 'DESC')->get();

            return view('admin.product.index', [
                'products' => $products,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function create()
    {
        try {
            $categories = Category::all();
            return view('admin.product.create', [
                'categories' => $categories,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'name'                      => 'required',
            'category_id'               => 'required',
            'image'                     => 'required|mimes:png,jpg|max:2000|file',
            'short_description'         => 'required',
            'long_description'          => 'required',
            'price'                     => 'required',
            'offer_price'               => 'nullable',
            'show_homepage'             => 'required',
            'seo_title'                 => 'nullable',
            'seo_description'           => 'nullable',
            'quantity'                  => 'required',

        ]);


        try {

            $sku = Helper::skuGenerate($request->name, $request->category_id);
            $image = Helper::image($request->image, '/uploads/product/');

            $data['image']      = $image;
            $data['slug']       = Str::lower(str_replace(' ', '-', $request->name)) . '-' . rand(999999, 10000000);
            $data['sku']        = $sku;


            Product::create($data);

            $notification = array(
                'message'       => 'Product created successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function edit(Product $product)
    {
        try {
            $categories = Category::all();
            return view('admin.product.edit', [
                'product'       => $product,
                'categories'    => $categories
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'                      => 'required',
            'category_id'               => 'required',
            'image'                     => 'nullable|mimes:png,jpg|max:2000|file',
            'short_description'         => 'required',
            'long_description'          => 'required',
            'price'                     => 'required',
            'offer_price'               => 'nullable',
            'show_homepage'             => 'required',
            'seo_title'                 => 'nullable',
            'seo_description'           => 'nullable',
            'quantity'                  => 'required',

        ]);


        try {

            if ($request->image != '') {
                // delete previous image with helper function
                $previousImage = Helper::prevImage($product->image, '/uploads/product/');

                $image = Helper::image($request->image, '/uploads/product/');

                $data['image']      = $image;
            }


            $sku = Helper::skuGenerate($request->name, $request->category_id);


            $data['slug']       = Str::lower(str_replace(' ', '-', $request->name)) . '-' . rand(999999, 10000000);
            $data['sku']        = $sku;



            $product->update($data);

            $notification = array(
                'message'       => 'Product updated successfully',
                'alert-type'    => 'success',
            );

            return redirect()->route('admin.product.index')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function destroy(Product $product)
    {
        try {

            // delete previous image with helper function
            Helper::prevImage($product->image, '/uploads/product/');

            // product gallery delete
            $galleries = ProductGallery::where('product_id', $product->id)->get();

            foreach ($galleries as $gallery) {
                Helper::prevImage($gallery->image, '/uploads/product/gallery/');
            }

            ProductGallery::where('product_id', $product->id)->delete();


            // varaints delete
            ProductVariant::where('product_id', $product->id)->delete();

            // options delete
            ProductOption::where('product_id', $product->id)->delete();


            // delete product
            $product->delete();

            $notification = array(
                'message'       => 'Product deleted successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function show(Product $product)
    {
        try {
            return view('admin.product.view', [
                'product' => $product,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function productStatus(Request $request, Product $product)
    {
        $data = $request->validate([
            'status' => 'required',
        ]);

        try {
            $product->update($data);


            $notification = array(
                'message'       => 'Status Changed Succesfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
