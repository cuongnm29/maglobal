<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Http\Requests\StoreReviewRequest;
 use App\Review;
 use App\Banner;
 use App\Setting;
 use App\Category;
 use App\Blog;
 use App\Member;
 use App\SettingMail;
 use Auth;
 use Mail;
use App\Mail\ReviewMail;
use App\Mail\ReviewAdminMail;

class ReviewController extends Controller
{
    public function CreateReview(StoreReviewRequest $request)
    {
        Review::create($request->all() );
        $email= $request['email'];
        $name= $request['name'];
        $rate= $request['rate'];
        $accountNumber=$request['accountNumber'];
        $comment= $request['content'];
        $mail = SettingMail::first();
        //sendmail
      Mail::to($email)->send(new ReviewMail());
      //sendadmin
      Mail::to($mail->host)->send(new ReviewAdminMail($accountNumber, $name, $rate, $comment,$email));

        return redirect()->route('home')->with('success','Thank you for review');
    }
    public function ListReview()
    {
        $memberID =  Auth::guard('member')->id();
        $member = Member::where('id',$memberID)->first();
        $categories = Category::where('parent_id', 0)->where("ismenu",1)->orderBy('isorder')->get();
        $setting = Setting::first();
        $services= Category::where('parent_id', 0)->where("istype",3)->orderBy('isorder')->get();
        $review=Review::where('status',1)->paginate(10);
        $blogfooter = Blog::join('category', 'category.id', '=', 'blog.catid')->where('category.istype','1')->where('blog.ishome',1)->select('blog.*','category.id as catid','category.slug as catslug')->get();
        return view('review',compact('categories','setting','blogfooter','member','services','review'));
    }
}
