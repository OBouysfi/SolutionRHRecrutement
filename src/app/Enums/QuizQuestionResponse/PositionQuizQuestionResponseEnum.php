<?php

namespace App\Enums\QuizQuestionResponse;

use Illuminate\Support\Collection;

class PositionQuizQuestionResponseEnum
{
    public const LETTER_A = 1;
    public const LETTER_B = 2;
    public const LETTER_C = 3;
    public const LETTER_D = 4;
    public const LETTER_E = 5;
    public const LETTER_F = 6;
    public const LETTER_G = 7;
    public const LETTER_H = 8;

    public static function getAll(): Collection
    {
        return Collection::make([
            self::LETTER_A => 'A',
            self::LETTER_B => 'B',
            self::LETTER_C => 'C',
            self::LETTER_D => 'D',
            self::LETTER_E => 'E',
            self::LETTER_F => 'F',
            self::LETTER_G => 'G',
            self::LETTER_H => 'H',
        ]);
    }

    public static function getValue($key): ?string
    {
        if ($key == null || $key == '') {
            return null;
        }
        $values = self::getAll();
        if (!$values->has($key)) {
            return null;
        }
        return $values->get($key);
    }

    public static function findByIndex($index): ?string
    {
        if ($index == null || $index == '') {
            return null;
        }
        $values = self::getAll()->values();
        return $values->get($index);
    }
}