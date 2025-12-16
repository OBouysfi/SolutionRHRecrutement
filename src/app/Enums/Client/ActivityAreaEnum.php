<?php

namespace App\Enums\Client;

use Illuminate\Support\Collection;

class ActivityAreaEnum
{
    public const AGRICULTURE = 1;
    public const AGROALIMENTAIRE = 2;
    public const AERONAUTIQUE = 3;
    public const AUTOMOBILE = 4;
    public const BTP = 5;
    public const BANQUES_ASSURANCES = 6;
    public const COMMERCE_DE_DETAIL = 7;
    public const COMMUNICATION = 8;
    public const ENERGIES_RENOUVELABLES = 9;
    public const ENSEIGNEMENT = 10;
    public const GRANDE_CONSOMMATION = 11;
    public const GOUVERNEMENT = 12;
    public const HOSPITALITE = 13;
    public const IMMOBILIER = 14;
    public const INDUSTRIE = 15;
    public const MEDIAS_DIVERTISSEMENT = 16;
    public const MINES = 17;
    public const NEGOCE = 18;
    public const OFFSHORE_OUTSOURCING = 19;
    public const PETROLE_GAZ = 20;
    public const SANTE = 21;
    public const SERVICES_PROFESSIONNELS = 22;
    public const TECHNOLOGIE_IT = 23;
    public const TELECOMMUNICATION = 24;
    public const TEXTILE_HABILLEMENT = 25;
    public const TOURISME = 26;
    public const TRANSPORT_LOGISTIQUE = 27;

    /**
     * Get all activity areas as a collection.
     *
     * @return Collection
     */
    public static function getAll(): Collection
    {
        return Collection::make([
            self::AGRICULTURE => 'Agriculture',
            self::AGROALIMENTAIRE => 'Agroalimentaire',
            self::AERONAUTIQUE => 'Aéronautique',
            self::AUTOMOBILE => 'Automobile',
            self::BTP => 'Bâtiments Travaux Publics (BTP)',
            self::BANQUES_ASSURANCES => 'Banques et Assurances',
            self::COMMERCE_DE_DETAIL => 'Commerce de détail',
            self::COMMUNICATION => 'Communication',
            self::ENERGIES_RENOUVELABLES => 'Energies renouvelables',
            self::ENSEIGNEMENT => 'Enseignement',
            self::GRANDE_CONSOMMATION => 'Grande consommation',
            self::GOUVERNEMENT => 'Gouvernement',
            self::HOSPITALITE => 'Hospitalité',
            self::IMMOBILIER => 'Immobilier',
            self::INDUSTRIE => 'Industrie',
            self::MEDIAS_DIVERTISSEMENT => 'Médias et divertissement',
            self::MINES => 'Mines',
            self::NEGOCE => 'Négoce',
            self::OFFSHORE_OUTSOURCING => 'Offshore et Outsourcing',
            self::PETROLE_GAZ => 'Pétrole et Gaz',
            self::SANTE => 'Santé',
            self::SERVICES_PROFESSIONNELS => 'Services professionnels',
            self::TECHNOLOGIE_IT => 'Technologie IT',
            self::TELECOMMUNICATION => 'Télécommunication',
            self::TEXTILE_HABILLEMENT => 'Textile et habillement',
            self::TOURISME => 'Tourisme',
            self::TRANSPORT_LOGISTIQUE => 'Transport et logistique',
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
