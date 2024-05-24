<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\ProductGallery;
use App\Models\Admin\ProductOption;
use App\Models\Admin\ProductVariant;
use App\Models\Frontend\ProductRating;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function productDetails($slug)
    {
        try {
            $product = Product::where('slug', $slug)->first();
            $relatedProducts = Product::where('id', '!=', $product->id)->where('category_id', $product->category_id)
                ->withAvg('reviews', 'rating')
                ->withCount('reviews')
                ->get();


            $productGallery = ProductGallery::where('product_id', $product->id)->get();
            $variants = ProductVariant::where('product_id', $product->id)->get();
            $options = ProductOption::where('product_id', $product->id)->get();
            $ratings = ProductRating::where(['product_id' => $product->id, 'status' => 1])->get();
            $averageRating = Product::where('id', $product->id)->withAvg('reviews', 'rating')->withCount('reviews')->first();


            // dd($averageRating);

            return view('frontend.product.productDetails', [
                'product'           => $product,
                'relatedProducts'   => $relatedProducts,
                'productGallery'    => $productGallery,
                'variants'          => $variants,
                'options'           => $options,
                'ratings'           => $ratings,
                'averageRating'     => $averageRating,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
