<?php
namespace App\Services;

use App\Models\Otp;
use Carbon\Carbon;

class OtpService
{
    protected $whatapp;
    public function __construct(WhatsappService $whatapp)
    {
        $this->whatapp = $whatapp;
    }
    public function send($phone_email)
    {
        $data = Otp::updateOrCreate(['email_phone' => $phone_email], [
            'otp'       => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
            'expiry_at' => Carbon::now()->addMinutes(10),
        ]);
        // $this->whatapp->sendOTP($data->email_phone, $data->otp);
        return [
            'status'     => true,
            'message'    => 'OTP sent to  user',
            'otp'        => $data->otp,
            'expires_at' => $data->expiry_at->toDateTimeString(),
        ];
    }
}
