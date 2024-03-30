<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ForgetPasswordRequest;
use App\Notifications\ResetPasswordNotification;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(ForgetPasswordRequest $request):View
    {
        $input=$request->only('email');
        $user=User::where('email',$input)->first();
        $user->notify(new ResetPasswordNotification());
       
        return view('auth.verify',compact('input'));


    }

    public function forget( ):View
    {
        return view('auth.forgetPassword');

    }
}
