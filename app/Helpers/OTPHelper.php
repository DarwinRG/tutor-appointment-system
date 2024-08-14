<?php

namespace App\Helpers;

class OTPHelper
{
  public static function generateOTP($length = 6)
  {
    return rand(pow(10, $length - 1), pow(10, $length) - 1);
  }
}