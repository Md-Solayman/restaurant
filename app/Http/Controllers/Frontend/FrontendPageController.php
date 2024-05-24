<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Admin\About;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogCategory;
use App\Models\Admin\Category;
use App\Models\Admin\Chef;
use App\Models\Admin\Contact;
use App\Models\Admin\Product;
use App\Models\Admin\TermsCondition;
use App\Models\Admin\Testimonial;
use Illuminate\Http\Request;
use Mail;

class FrontendPageController extends Controller
{
    // chef page
    public function chefPage()
    {
        try {
            $chefs = Chef::where('status', 1)->get();

            return view('frontend.pages.chef', [
                'chefs' => $chefs,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // testimonial page
    public function testimonialPage()
    {
        try {
            $testimonials = Testimonial::where('status', 1)->get();

            return view('frontend.pages.testimonial', [
                'testimonials' => $testimonials,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // blog page
    public function blogPage(Request $request)
    {
        try {
            $blogs = Blog::withCount(['comments'    => function ($query) {
                $query->where('status', 1);
            }])->with(['category', 'admin'])->where('status', 1);

            $blogCategories = BlogCategory::where('status', 1)->get();

            if ($request->has('search') && $request->filled('search')) {
                $blogs->where(function ($query) use ($request) {
                    $query->where('title', 'like', '%' . $request->search . '%');
                    $query->orWhere('desc', 'like', '%' . $request->search . '%');
                });
            }

            if ($request->has('category') && $request->filled('category')) {
                $blogs->whereHas('category', function ($query) use ($request) {
                    $query->where('name', $request->category);
                });
            }

            $blogs = $blogs->orderBy('id', 'DESC')->paginate(4);

            return view('frontend.pages.blogs', [
                'blogs'             => $blogs,
                'blogCategories'    => $blogCategories,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // blog details page
    public function blogDetails($slug)
    {
        try {
            $blog = Blog::where('slug', $slug)->first();
            $recentBlogs = Blog::where('id', '!=', $blog->id)->latest()->take(4)->get();

            // prev & next blog
            $prevBlog = Blog::select('id', 'title', 'slug', 'image')->where('id', '<', $blog->id)->where('status', 1)->orderBy('id', 'DESC')->first();
            $nextBlog = Blog::select('id', 'title', 'slug', 'image')->where('id', '>', $blog->id)->where('status', 1)->orderBy('id', 'ASC')->first();

            // blog categories
            $blogCategories = BlogCategory::withCount(['blog' => function ($query) {
                $query->where('status', 1);
            }])->where('status', 1)->get();

            $blogComments = $blog->comments()->where('status', 1)->get();



            return view('frontend.pages.blogDetails', [
                'blogCategories'     => $blogCategories,
                'blog'               => $blog,
                'nextBlog'           => $nextBlog,
                'prevBlog'           => $prevBlog,
                'recentBlogs'        => $recentBlogs,
                'blogComments'       => $blogComments,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // product
    public function productPage(Request $request)
    {
        try {

            $productCategories = Category::all();

            $products = Product::where('status', 1);

            if ($request->has('search') && $request->get('search')) {
                $products->where(function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                    $query->orWhere('long_description', 'like', '%' . $request->search . '%');
                });
            }


            if ($request->has('category') && $request->filled('category')) {
                $products->whereHas('category', function ($query) use ($request) {
                    $query->where('name', $request->category);
                });
            }

            $products = $products->withAvg('reviews', 'rating')->withCount('reviews')->paginate(4);


            return view('frontend.pages.products', [
                'products'             => $products,
                'productCategories'    => $productCategories,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // about page
    public function aboutPage()
    {
        try {
            $about = About::first();

            return view('frontend.pages.about', [
                'about' => $about,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // terms & condition
    public function termsPage()
    {
        try {
            $terms = TermsCondition::first();

            return view('frontend.pages.terms_condition', [
                'terms' => $terms,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // contact page
    public function contactPage()
    {
        try {
            $contact = Contact::first();

            return view('frontend.pages.contact', [
                'contact' => $contact,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function contactMessageSend(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required',
            'message'       => 'required',
            'subject'       => 'required',
        ]);

        try {
            Mail::send(new ContactMail($request->name, $request->email, $request->subject, $request->message));


            $notification = array(
                'message'       => 'Mail Sent Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
