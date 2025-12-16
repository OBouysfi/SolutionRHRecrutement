<?php

namespace App\Enums\TechnicalTest;

use Illuminate\Support\Collection;

class GroupeEnum
{
    public const BUREAUTIQUE = 1;
    public const CODAGE = 2;
    public const AUTRE = 3;
    public const CAO_DAO = 4;
    public const MULTIMEDIA = 5;
    public const FINANCE = 6;



    /**
     * Get all fiscal regimes as a collection.
     *
     * @return Collection
     */
    public static function getAll(): Collection
    {
        return Collection::make([
            self::BUREAUTIQUE => __('generated.groupe_bureautique'),
            self::CODAGE      => __('generated.groupe_codage'),
            self::AUTRE       => __('generated.groupe_autre'),
            self::CAO_DAO     => __('generated.groupe_cao_dao'),
            self::MULTIMEDIA  => __('generated.groupe_multimedia'),
            self::FINANCE     => __('generated.groupe_finance'),
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
