<?php

namespace App\Enums\TechnicalTest;

use Illuminate\Support\Collection;

class AlgorithmEnum
{
    public const RANDOM_SEQUENTIEL = 1;
    public const ORDERED_SEQUENTIEL = 2;


    /**
     * Get all fiscal regimes as a collection.
     *
     * @return Collection
     */
    public static function getAll(): Collection
    {
        return Collection::make([
            self::RANDOM_SEQUENTIEL  => __('generated.random_sequentiel'),
            self::ORDERED_SEQUENTIEL => __('generated.ordered_sequentiel'),
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
