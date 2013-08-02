<?php

class RandomCode
{

    public static function generateEmailVerificationCode()
    {
        $chars = str_split('abcdefghijklmnopqrstuvwxyz0123456789');
        $code = '';
        for ($i = 0; $i < 16; $i++) {
            $code .= $chars[array_rand($chars)];
        }
        return $code;
    }

}