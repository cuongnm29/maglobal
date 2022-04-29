<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Category;
use App\Blog;
use App\Setting;
use App\SettingMail;
use App\Order;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use Image;
use Mail;
use App\Mail\RegisterMail;
use App\Mail\RegisterAdminMail;
use App\Mail\ResetPasswordMail;
use DB;
 use Route;
 use Carbon\Carbon;
 use Illuminate\Support\Str;
 use Illuminate\Support\Facades\Storage;
class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:member', ['except' => ['logout']]);
    }
    
    public function showLoginForm()
    {
        $categories = Category::where('parent_id', 0)->where("ismenu",1)->orderBy('isorder')->get();
        $setting = Setting::first();
        $services= Category::where('parent_id', 0)->where("istype",3)->orderBy('isorder')->get();
        $blogfooter = Blog::join('category', 'category.id', '=', 'blog.catid')->where('category.istype','1')->where('blog.ishome',1)->select('blog.*','category.id as catid','category.slug as catslug')->get();
        return view('signin',compact('setting','categories','blogfooter','services'));
    }
    public function resetPassword()
    {
        $categories = Category::where('parent_id', 0)->where("ismenu",1)->orderBy('isorder')->get();
        $setting = Setting::first();
       $blogfooter = Blog::join('category', 'category.id', '=', 'blog.catid')->where('category.istype','1')->where('blog.ishome',1)->select('blog.*','category.id as catid','category.slug as catslug')->get();
        return view('forgot',compact('setting','categories','blogfooter'));
    }
    public function sendMailResetPassword(Request $request)
    {
        $member = DB::table('member')->where('email', '=', $request->email) ->first();
        //Check if the member exists
        if (!isset($member)) {
            return redirect()->back()->withErrors(['email' => trans('Email does not exist')]);
        }
        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')->where('email', $request->email)->first();
        $this->sendResetEmail($request->email, $tokenData->token);
        return redirect()->intended(route('member.password.reset'))->with('success','Please check your mail and click on the provided link to reset your password');
    }
    private function sendResetEmail($email, $token)
        {
        //Retrieve the user from the database
        //Generate, the password reset link. The token generated is embedded in the link
        $link = url('/member/password/change/' . $token);
            try {
                Mail::to($email)->send(new ResetPasswordMail($link)); 
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
        public function ChangePassword($token)
    {
        $categories = Category::where('parent_id', 0)->where("ismenu",1)->orderBy('isorder')->get();
        $setting = Setting::first();
      $blogfooter = Blog::join('category', 'category.id', '=', 'blog.catid')->where('category.istype','1')->where('blog.ishome',1)->select('blog.*','category.id as catid','category.slug as catslug')->get();
        return view('changePass',compact('setting','categories','blogfooter','token'));
    }
    public function UpdatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
            ]);
            $passwordReset = DB::table('password_resets')->where('token', $request->token)->first();
            if (!isset($passwordReset)) {
                return redirect()->back()->withErrors(['password' => trans('Token is expried')]);
            }
            $member = DB::table('member')->where('email',  $passwordReset->email)->first();
            $profile = Member::find($member->id);
            $request['password']= Hash::make($request->password);
            $profile->password = $request->input('password');
            $profile->save();
        return redirect('/member/password/change/'.$request->token)->with('success','Change password successful');
    }
    public function showRegisterForm()
    {
        $categories = Category::where('parent_id', 0)->where("ismenu",1)->orderBy('isorder')->get();
        $setting = Setting::first();
         $services= Category::where('parent_id', 0)->where("istype",3)->orderBy('isorder')->get();
       $blogfooter = Blog::join('category', 'category.id', '=', 'blog.catid')->where('category.istype','1')->where('blog.ishome',1)->select('blog.*','category.id as catid','category.slug as catslug')->get();
        return view('signup',compact('setting','categories','blogfooter','services'));
    }
    public function login(Request $request)
    {
            $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
            ]);
            // Attempt to log the user in
            if (Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password],false,false)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('member.profile'));
            }
            // if unsuccessful, then redirect back to the login with the form data
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['email' => trans('Incorrect email or password')]);
    }
    public function logout()
    {
        Auth::guard('member')->logout();
        return redirect('/member/login');
    }
    public function register(StoreMemberRequest $request)
    {
        $request['password']= Hash::make($request->password);
        Member::create($request->all() );
        $email= $request['email'];
        $firstname= $request['firstname'];
        $lastname= $request['lastname'];
        $phone= $request['phone'];
        $mail = SettingMail::first();
        //sendmail
        $accountNumber =$request['numberAccount'];
        Mail::to($email)->send(new RegisterMail($accountNumber));
        //send mail for admin
        Mail::to($mail->host)->send(new RegisterAdminMail($accountNumber,$firstname,$lastname,$email,$phone));
        return redirect()->intended(route('member.login'))->with('success','Thank you for register ');
    }
    public function profile()
    {
        $memberID =  Auth::guard('member')->id();
        $member = Member::where('id',$memberID)->first();
        $categories = Category::where('parent_id', 0)->where("ismenu",1)->orderBy('isorder')->get();
        $setting = Setting::first();
        $services= Category::where('parent_id', 0)->where("istype",3)->orderBy('isorder')->get();
      $blogfooter = Blog::join('category', 'category.id', '=', 'blog.catid')->where('category.istype','1')->where('blog.ishome',1)->select('blog.*','category.id as catid','category.slug as catslug')->get();
        return view('profile',compact('setting','categories','blogfooter','member','services'));
    }

    public function updateProfile(Request $request)
    {
        $profile = Member::find($request->id);
        $request['password']= Hash::make($request->password);
      
        $profile->firstname = $request->input('firstname');
        $profile->lastname = $request->input('lastname');
        $profile->phone = $request->input('phone');
        $profile->password = $request->input('password');
     
        if ($request->hasFile('photo')) {
//        $path = Storage::disk('local')->put($request->file('photo')->getClientOriginalName(),$request->file('photo')->get());
            $path = $request->file('photo')->store('/photos/1/avatar/'.$profile->numberAccount);
            $profile->photo = $path;
        }
        $profile->save();
       return redirect()->route('member.profile');
    }
    public function order()
    {
        $memberID =  Auth::guard('member')->id();
        $member = Member::where('id',$memberID)->first();
        $categories = Category::where('parent_id', 0)->where("ismenu",1)->orderBy('isorder')->get();
        $setting = Setting::first();
          $services= Category::where('parent_id', 0)->where("istype",3)->orderBy('isorder')->get();
      $blogfooter = Blog::join('category', 'category.id', '=', 'blog.catid')->where('category.istype','1')->where('blog.ishome',1)->select('blog.*','category.id as catid','category.slug as catslug')->get();
        $order = Order::where("accountNumber",$member->numberAccount)->get();
        return view('order',compact('setting','categories','blogfooter','member','order','services'));
    }
}