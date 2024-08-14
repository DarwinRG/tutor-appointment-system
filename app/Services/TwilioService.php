<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendOTP($phoneNumber, $otp)
    {
        $formattedPhoneNumber = $this->formatPhoneNumber($phoneNumber);
        $this->client->messages->create(
            $formattedPhoneNumber,
            [
                'from' => env('TWILIO_PHONE_NUMBER'),
                'body' => "Your OTP code is: $otp"
            ]
        );
    }

    private function formatPhoneNumber($phoneNumber)
    {
        // Ensure the phone number is in E.164 format
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
        if (substr($phoneNumber, 0, 2) != '63') {
            $phoneNumber = '63' . substr($phoneNumber, 1);
        }
        return '+' . $phoneNumber;
    }
}