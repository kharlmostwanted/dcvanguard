<?php
if (!function_exists('spellOutNumber')) {
    function spellOutNumber($number, $locale = 'en_US')
    {
        $formatter = new NumberFormatter($locale, NumberFormatter::SPELLOUT);
        return $formatter->format($number);
    }
}
