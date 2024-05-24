<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\Blog;
use App\Models\Admin\Product;
use App\Models\Admin\Subscribe;
use App\Models\Frontend\Order;
use App\Models\User;
use Auth;
use Hash;
use Image;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    // dashboard page
    public function index()
    {
        try {
            $todaysOrders = Order::whereDate('created_at', now()->format('Y-m-d'))->count();
            $todaysEarnings = Order::whereDate('created_at', now()->format('Y-m-d'))->where('order_status', 'delivered')->sum('grand_total');

            $thisMonthOrders = Order::whereMonth('created_at', now()->month)->count();
            $thisMonthEarnings = Order::whereMonth('created_at', now()->month)->where('order_status', 'delivered')->sum('grand_total');

            $thisYearOrders = Order::whereYear('created_at', now()->year)->count();
            $thisYearEarnings = Order::whereYear('created_at', now()->year)->where('order_status', 'delivered')->sum('grand_total');

            $totalProducts = Product::count();
            $totalOrders = Order::count();

            $totalAdmins = Admin::count();
            $totalUsers = User::count();
            $totalSubscribers = Subscribe::count();

            $totalBlogs = Blog::count();

            $todaysOrdersList = Order::whereDate('created_at', now()->format('Y-m-d'))->get();


            return view('admin.dashboard', [
                'todaysOrders'         => $todaysOrders,
                'todaysEarnings'       => $todaysEarnings,
                'thisMonthOrders'      => $thisMonthOrders,
                'thisMonthEarnings'    => $thisMonthEarnings,
                'thisYearOrders'       => $thisYearOrders,
                'thisYearEarnings'     => $thisYearEarnings,
                'totalProducts'        => $totalProducts,
                'totalOrders'          => $totalOrders,
                'totalAdmins'          => $totalAdmins,
                'totalUsers'           => $totalUsers,
                'totalSubscribers'     => $totalSubscribers,
                'totalBlogs'           => $totalBlogs,
                'todaysOrdersList'     => $todaysOrdersList,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // admin login page
    public function loginPage()
    {
        try {
            return view('admin.login');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // admin login process
    public function loginStore(Request $request)
    {

        $data = $request->validate([
            'email'         => 'required',
            'password'      => 'required',
        ]);


        try {
            if (Auth::guard('admin')->attempt($data)) {

                $notification = array(
                    'message'       => 'Login Successfully',
                    'alert-type'    => 'success',
                );

                return redirect()->route('admin.dashboard')->with($notification);
            } else {
                return back()->with('error', 'Credentials not match in our records');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // admin logout
    public function logout()
    {
        try {
            Auth::guard('admin')->logout();
            return redirect('/');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // admin profile
    public function profilePage()
    {
        try {
            return view('admin.profile');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // password update
    public function passwordUpdate(Request $request)
    {

        $request->validate(
            [
                'password'                  => 'required|min:8',

                'password_confirmation'     => 'required',
            ]
        );

        try {
            if ($request->password != $request->password_confirmation) {
                $notification = array(
                    'message'       => 'New Password and Confirm Password Not Match',
                    'alert-type'    => 'error',
                );

                return back()->with($notification);
            } else {
                Admin::findOrFail(Auth::guard('admin')->id())->update([
                    'password' => Hash::make($request->password),
                ]);

                $notification = array(
                    'message'       => 'Password Updated Successfully',
                    'alert-type'    => 'success',
                );

                return back()->with($notification);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    // info update
    public function infoUpdate(Request $request)
    {

        $request->validate([
            'name'  => 'required',
            'email' => 'required',
        ]);

        try {

            if (Admin::where('email', $request->email)->exists()) {
                Admin::findOrFail(Auth::guard('admin')->id())->update([
                    'name'          => $request->name,
                ]);

                $notification = array(
                    'message'       => 'Email Already Exists',
                    'alert-type'    => 'error',
                );

                return back()->with($notification);
            } else {
                Admin::findOrFail(Auth::guard('admin')->id())->update([
                    'name'          => $request->name,
                    'email'         => $request->email,
                ]);

                $notification = array(
                    'message'       => 'Profile Info Updated Successfully',
                    'alert-type'    => 'success',
                );

                return back()->with($notification);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    // image update
    public function imageUpdate(Request $request)
    {
        $request->validate([
            'image'         => 'required|mimes:png,jpg|max:3000|image',
        ]);

        try {

            if (Admin::findOrFail(Auth::guard('admin')->id())->image != '') {
                $image = Admin::findOrFail(Auth::guard('admin')->id())->image;
                $deletedFrom = public_path('/uploads/admin/' . $image);
                unlink($deletedFrom);
            }

            $image = $request->image;
            $extension = $image->getClientOriginalExtension();
            $fileName = 'media_' . uniqid() . '.' . $extension;

            Image::make($image)->save(public_path('/uploads/admin/' . $fileName));


            Admin::findOrFail(Auth::guard('admin')->id())->update([
                'image'         => $fileName,
            ]);
            $notification = array(
                'message'       => 'Admin Image Updated',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
