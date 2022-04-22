<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Misc\Helpers\Errors;
use App\Http\Misc\Helpers\Success;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ResetRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPassword extends Controller
{
    public function store(ForgetRequest $request)
    {
        $token = Str::random(5);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $to_name = $request->email;
        $to_email = $request->email;
        $body = "the code is \n" . $token;

        Mail::raw($body,  function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Reset password');
            $message->from(env('MAIL_USERNAME'), env('MAIL_USERNAME'));
        });
        return $this->success_response(Success::SENT);
    }

    public function createNewPassword(ResetRequest $request)
    {
        $getdata = DB::table('password_resets')->where("token", $request->token)->select('created_at')->get();
        $created_at = Carbon::parse($getdata[0]->created_at)->addMinutes(5);
        $deleted_at = Carbon::parse(now());
        if ($created_at <= $deleted_at) {
            DB::table('password_resets')->where(['email' => $request->email])->delete();
            return $this->error_response(Errors::CODE);
        } else {
            $update = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();
            if (!$update) {
                return $this->error_response(Errors::CODE);
            } else {
                $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

                // Delete password_resets record
                DB::table('password_resets')->where(['email' => $request->email])->delete();

                return $this->success_response(Success::CHANGE);
            }
        }
    }
}
