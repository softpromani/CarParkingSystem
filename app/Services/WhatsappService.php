<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsappService
{
    protected $baseUrl;
    protected $phoneNumberId;
    protected $accessToken;
    protected $languageCode;
    protected $otpTemplateName;

    public function __construct()
    {
        $this->baseUrl         = 'https://graph.facebook.com/v18.0/';
        $this->phoneNumberId   = env('WHATSAPP_PHONE_NUMBER_ID');
        $this->accessToken     = env('WHATSAPP_ACCESS_TOKEN');
        $this->otpTemplateName = env('WHATSAPP_TEMPLATE_NAME', 'user_verify');
        $this->languageCode    = env('WHATSAPP_LANGUAGE_CODE', 'en_US');
    }

    /**
     * Send OTP message via WhatsApp
     */
    public function sendOTP(string $phone, string $otp): array
    {
        $url = $this->baseUrl . $this->phoneNumberId . "/messages";

        $payload = [
            "messaging_product" => "whatsapp",
            "to"                => $phone,
            "type"              => "template",
            "template"          => [
                "name"       => $this->otpTemplateName,
                "language"   => [
                    "code" => $this->languageCode,
                ],
                "components" => [
                    [
                        "type"       => "body",
                        "parameters" => [
                            [
                                "type" => "text",
                                "text" => $otp,
                            ],
                        ],
                    ],
                    [
                        "type"       => "button",
                        "sub_type"   => "url",
                        "index"      => "0",
                        "parameters" => [
                            [
                                "type" => "text",
                                "text" => (string) $otp,
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $response = Http::withToken($this->accessToken)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post($url, $payload);

        return $response->json();
    }

    // Future methods like sendOrderDetails(), sendInvoice(), etc. can go here
}
