<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Http\Requests\StoreOrderRequest;
 use App\Order;
 use App\Banner;
 use App\Setting;
 use App\Category;
 use App\Blog;
 use App\Member;
 use App\SettingMail;
 use Auth;
use Mail;
use App\Vourcher;
use Carbon\Carbon;
use App\Mail\BookingMail;
use App\Mail\BookingAdminMail;
class OrderController extends Controller
{
    public function CreateOrder(StoreOrderRequest $request)
    {
      $vourcher =$request['vourcherId'];
      $dt = Carbon::now()->toDateString();
      if($vourcher!="")
          {
          $vourchers=Vourcher::where('name',$vourcher)->where('status',1)->where('expried','>',$dt)->first();
         
          if (!isset($vourchers)) {
            return redirect()->back()->withErrors(['vourcherId' => trans('Vourcher does not exist')]);
        }
          $request['vourcherId'] = $vourchers->id;
          $vourchers->update(['status' => '0']);
      }
      Order::create($request->all());
      $mail = SettingMail::first();
      $email= $request['email'];
      $firstname= $request['firstname'];
      $lastname= $request['lastname'];
      $phone= $request['phone'];
      $accountNumber=isset($request['accountNumber'])?$request['accountNumber']:"N/A";
      $dateOrder= $request['dateOrder'];
      $timeOrder =$request['timeOrder'];
     
     
      //sendmail
      Mail::to($email)->send(new BookingMail($accountNumber,$firstname,$lastname,$email,$phone,$dateOrder,$timeOrder));
      //send mail admin
      Mail::to($mail->host)->send(new BookingAdminMail($accountNumber,$firstname,$lastname,$email,$phone,$dateOrder,$timeOrder));
        return redirect()->route('home')->with('success','Booking sucessful.');
    
    }
}