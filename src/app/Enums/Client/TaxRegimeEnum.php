<?php

namespace App\Enums\Client;

use Illuminate\Support\Collection;

class TaxRegimeEnum
{
    public const REGIME_NORMAL = 'Régime normal';
    public const REGIME_SIMPLIFIE = 'Régime simplifié';
    public const REGIME_AGRICOLE = 'Régime agricole';
    public const REGIME_EXPORTATION = 'Régime d\'exportation';
    public const REGIME_ZONE_FRANCHE = 'Régime zone franche';
    public const REGIME_PROMOTION_INVESTISSEMENT = 'Régime promotion d\'investissement';
    public const REGIME_FORFAIT = 'Régime forfait';
    public const REGIME_PROFESSIONS_LIBERALES = 'Régime professions libérales';

    /**
     * Get all fiscal regimes as a collection.
     *
     * @return Collection
     */
    public static function getAll(): Collection
    {
        return Collection::make([
            self::REGIME_NORMAL                  => __('generated.regime_normal'),
            self::REGIME_SIMPLIFIE               => __('generated.regime_simplifie'),
            self::REGIME_AGRICOLE                => __('generated.regime_agricole'),
            self::REGIME_EXPORTATION             => __('generated.regime_exportation'),
            self::REGIME_ZONE_FRANCHE            => __('generated.regime_zone_franche'),
            self::REGIME_PROMOTION_INVESTISSEMENT=> __('generated.regime_promotion_investissement'),
            self::REGIME_FORFAIT                 => __('generated.regime_forfait'),
            self::REGIME_PROFESSIONS_LIBERALES   => __('generated.regime_professions_liberales'),
        ]);
    }

    /**
     * Get the label for a given key.
     *
     * @param int|null $key
     * @return string|null
     */
    public static function getValue(?string $key): ?string
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
