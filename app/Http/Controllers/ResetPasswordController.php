<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\VerifyVerificationCodeRequest;
use App\Models\User;
use Otp;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
    private $otp;

    public function __construct(){

        $this->otp=new Otp();

    }

    public function verifyCode(VerifyVerificationCodeRequest $request)
    {

        $otp2=$this->otp->validate($request->email,$request->code_otp);
        $code=$request->code_otp;

        if(! $otp2->status)
        {
            return redirect()->route('verify')->withErrors(['error' => $otp2]);

        }

        return view('auth.resetPassword',compact('code'));



    }


    public function verify():View
    {
        return view('auth.verify');

    }

    public function passwordReset(ResetPasswordRequest $request):RedirectResponse
    {

        $user=User::where('email',$request->email)->first();
        $user->update(['password'=>Hash::make($request->password)]);
        return redirect()->route('login');

    }
}
