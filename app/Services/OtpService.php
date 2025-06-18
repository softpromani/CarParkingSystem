<?php
namespace App\Services;

use App\Models\Otp;
use Carbon\Carbon;

class OtpService
{
    public function send($phone_email)
    {
        $data = Otp::updateOrCreate(['email_phone' => $phone_email], [
            'otp'       => rand(0000, 9999),
            'expiry_at' => Carbon::now()->addMinutes(10),
        ]);
        return [
            'status'     => true,
            'message'    => 'OTP sent to  user',
            'otp'        => $data->otp,
            'expires_at' => $data->expiry_at->toDateTimeString(),
        ];
    }
}
