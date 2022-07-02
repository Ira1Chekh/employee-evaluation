<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self high()
 * @method static self medium()
 * @method static self low()
 */
final class ProjectImportanceEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'high' => 3,
            'medium' => 2,
            'low' => 1,
        ];
    }
}
