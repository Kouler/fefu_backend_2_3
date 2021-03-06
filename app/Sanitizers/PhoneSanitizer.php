<?php

namespace App\Sanitizers;
use function preg_replace;
class PhoneSanitizer
{
    public static function sanitize(?string $phone) : ?string {
        if ($phone === null) {
            return null;
        }

        return preg_replace(
            '/^([\+7|7|8]{1,2})\((\d{3})\) (\d{3})-(\d{2})-(\d{2})$/',
            '7$2$3$4$5',
            $phone);
    }
}
