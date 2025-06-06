<?php

namespace App\Helpers;

use Filament\Support\RawJs;

class FormMasks
{
    public static function moedaBRL(): RawJs
    {
        return RawJs::make("
            {
                mask: Number,
                scale: 2,
                signed: false,
                thousandsSeparator: '.',
                padFractionalZeros: true,
                normalizeZeros: true,
                radix: ',',
                mapToRadix: ['.']
            }
        ");
    }
}
