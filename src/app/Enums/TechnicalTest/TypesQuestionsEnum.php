<?php

namespace App\Enums\TechnicalTest;

use Illuminate\Support\Collection;

class TypesQuestionsEnum
{
    public const QCM = 1;
    public const QCU = 2;
    public const RIGHT_WRONG = 3;
    public const CLASSEMENT = 4;
    public const APPARIEMENT = 5;


    /**
     * Get all fiscal regimes as a collection.
     *
     * @return Collection
     */
    public static function getAll(): Collection
    {
        return Collection::make([
            self::QCM         => __('generated.qcm'),
            self::QCU         => __('generated.qcu'),
            self::RIGHT_WRONG => __('generated.right_wrong'),
            self::CLASSEMENT  => __('generated.classement'),
            self::APPARIEMENT => __('generated.appariement'),
        ]);
    }

    /**
     * Get the label for a given key.
     *
     * @param int|null $key
     * @return string|null
     */
    public static function getValue(?int $key): ?string
    {
        if ($key === null) {
            return null;
        }

        $values = self::getAll();

        return $values->get($key);
    }

    /**
     * Get the key for a given value.
     *
     * @param string|null $value
     * @return int|null
     */
    public static function getKey(?string $value): ?int
    {
        if ($value === null) {
            return null;
        }

        $values = self::getAll();

        $key = $values->search($value);

        return $key !== false ? $key : null;
    }
}
