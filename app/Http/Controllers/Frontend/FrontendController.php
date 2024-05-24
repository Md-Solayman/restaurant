<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper as HelpersHelper;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Admin\About;
use App\Models\Admin\AppBanner;
use App\Models\Admin\BannerSlider;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogCategory;
use App\Models\Admin\Category;
use App\Models\Admin\Chef;
use App\Models\Admin\Contact;
use App\Models\Admin\DailyOffer;
use App\Models\Admin\Product;
use App\Models\Admin\SectionTitle;
use App\Models\Admin\TermsCondition;
use App\Models\Admin\Testimonial;
use App\Models\Frontend\Wishlist;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Image;


class FrontendController extends Controller
{
    public function index()
    {
        try {
            $sectionTitles = SectionTitle::pluck('value', 'key')->toArray();
            $dailyOffers = DailyOffer::take(8)->get();
            $bannerSliders = BannerSlider::take(3)->get();
            $chefs = Chef::where(['show_homepage'   => 1, 'status' => 1])->get();
            $appBanner = AppBanner::orderBy('id', 'DESC')->first();
            $testimonials = Testimonial::where(['status' => 1, 'show_homepage' => 1])->take(4)->get();
            $blogs = Blog::where('status', 1)->take(4)->get();



            return view('frontend.home', [
                'sectionTitles'     => $sectionTitles,
                'dailyOffers'       => $dailyOffers,
                'bannerSliders'     => $bannerSliders,
                'chefs'             => $chefs,
                'appBanner'         => $appBanner,
                'testimonials'      => $testimonials,
                'blogs'             => $blogs,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function profileUpdate(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'country'   => 'required',
            'address'   => 'required',
        ]);

        try {

            if ($request->password == '') {
                User::find(Auth::id())->update($data);
            } else {
                $data['password'] = Hash::make($request->password);
                User::find(Auth::id())->update($data);
            }

            $notification = array(
                'message'       => 'Profile Updated Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function profileImageUpdate(Request $request)
    {
        $request->validate([
            'image'     => 'required|mimes:jpg,png|image|max:3000',
        ]);

        try {

            if (Auth::user()->image != '') {
                $image = Auth::user()->image;
                $deletedFrom = public_path('/uploads/user/' . $image);
                unlink($deletedFrom);
            }

            $uploadedFile = $request->image;
            $extension = $uploadedFile->getClientOriginalExtension();
            $fileName = 'media_' . uniqid() . '.' . $extension;

            Image::make($uploadedFile)->save(public_path('/uploads/user/' . $fileName));


            User::findOrFail(Auth::id())->update([
                'image'         => $fileName,
            ]);

            $notification = array(
                'message'       => 'Image Updated',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }





    // wishlist
    public function wishlist()
    {
        try {
            $wishlists = Wishlist::where('user_id', Auth::id())->get();

            return view('frontend.wishlist.index', [
                'wishlists'         => $wishlists,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function wishlistStore(Request $request, $productId)
    {

        try {

            if (!Auth::check()) {
                return response(['message'  => 'Please login to add product into wishlist', 'status' => 'error']);
            }


            // check if already exists
            $alreadyExists = Wishlist::where(['user_id'  => Auth::id(), 'product_id' => $productId])->exists();

            if ($alreadyExists) {

                return response(['message'  => 'Already add product into wishlist', 'status'    => 'error']);
            }


            // create new wishlist
            Wishlist::create([
                'product_id'    => $productId,
                'user_id'       => Auth::id(),
            ]);

            return response(['message'  => 'Product add to wishlist', 'status'  => 'success']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
