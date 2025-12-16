<?php

namespace App\Enums\TechnicalTest;

use Illuminate\Support\Collection;

class CategoryEnum
{
    public const EXCEL_2010 = 5;
    public const EXCEL_2016 = 16;
    public const WORD_2016 = 17;
    public const POWERPOINT_2016 = 18;
    public const OUTLOOK_2016 = 36;
    public const EXCEL_2019 = 57;
    public const POWERPOINT_2019 = 58;
    public const WORD_2019 = 59;
    public const WORDPRESS = 61;
    public const PYTHON_3 = 101;
    public const PHP = 103;
    public const JAVA = 104;
    public const HTML = 105;
    public const C_SHARP = 108;
    public const OUTLOOK_2013 = 208;
    public const DIGCOMP = 217;
    public const INDESIGN = 227;
    public const GRAMMAR_FR = 228;
    public const AUTOCAD = 230;
    public const ILLUSTRATOR = 231;
    public const ANGULAR = 232;
    public const DATA_ENTRY = 242;
    public const VBA_EXCEL_2019 = 270;
    public const GOOGLE_SHEETS = 277;
    public const GOOGLE_DOCS = 279;
    public const LIBREOFFICE_CALC_FR = 281;
    public const LIBREOFFICE_IMPRESS = 287;
    public const LIBREOFFICE_WRITER = 288;
    public const SECRETARIAT = 293;
    public const ADOBE_PHOTOSHOP_2021 = 294;
    public const MICROSOFT_365 = 295;
    public const SQL = 297;
    public const CYBERSECURITY = 298;
    public const REVIT_ARCHITECTURE = 299;
    public const SALESFORCE = 300;
    public const REACTJS = 302;
    public const GOOGLE_SLIDES = 305;
    public const JAVASCRIPT = 319;
    public const ACCESS_2019 = 325;
    public const ACCOUNTING_FINANCE = 326;
    public const MATHEMATICS = 327;
    public const SAFETY_HYGIENE = 328;
    public const EXCEL_MICROSOFT_365 = 334;
    public const WINDOWS_ENVIRONMENT = 336;
    public const MEDICAL_SECRETARY = 338;
    public const COBOL = 339;
    public const WEB_DEVELOPER = 342;
    public const TEAMS = 343;
    public const ONEDRIVE = 344;
    public const SHAREPOINT = 345;
    public const PSYCHOTECHNICAL_TESTS = 347;
    public const POWER_BI = 349;
    public const CUSTOMER_SERVICE = 350;
    public const FRENCH_FOREIGN_LANGUAGE = 353;
    public const WORD_MICROSOFT_365 = 358;
    public const IA_ACT = 366;




    /**
     * Get all fiscal regimes as a collection.
     *
     * @return Collection
     */
    public static function getAll(): Collection
    {
        return Collection::make([
            self::EXCEL_2010                => __('generated.excel_2010'),
            self::EXCEL_2016                => __('generated.excel_2016'),
            self::WORD_2016                 => __('generated.word_2016'),
            self::POWERPOINT_2016           => __('generated.powerpoint_2016'),
            self::OUTLOOK_2016              => __('generated.outlook_2016'),
            self::EXCEL_2019                => __('generated.excel_2019'),
            self::POWERPOINT_2019           => __('generated.powerpoint_2019'),
            self::WORD_2019                 => __('generated.word_2019'),
            self::WORDPRESS                 => __('generated.wordpress'),
            self::PYTHON_3                  => __('generated.python_3'),
            self::PHP                       => __('generated.php'),
            self::JAVA                      => __('generated.java'),
            self::HTML                      => __('generated.html'),
            self::C_SHARP                   => __('generated.c_sharp'),
            self::OUTLOOK_2013              => __('generated.outlook_2013'),
            self::DIGCOMP                   => __('generated.digcomp'),
            self::INDESIGN                  => __('generated.indesign'),
            self::GRAMMAR_FR                => __('generated.grammar_fr'),
            self::AUTOCAD                   => __('generated.autocad'),
            self::ILLUSTRATOR               => __('generated.illustrator'),
            self::ANGULAR                   => __('generated.angular'),
            self::DATA_ENTRY                => __('generated.data_entry'),
            self::VBA_EXCEL_2019            => __('generated.vba_excel_2019'),
            self::GOOGLE_SHEETS             => __('generated.google_sheets'),
            self::GOOGLE_DOCS               => __('generated.google_docs'),
            self::LIBREOFFICE_CALC_FR       => __('generated.libreoffice_calc_fr'),
            self::LIBREOFFICE_IMPRESS       => __('generated.libreoffice_impress'),
            self::LIBREOFFICE_WRITER        => __('generated.libreoffice_writer'),
            self::SECRETARIAT               => __('generated.secretariat'),
            self::ADOBE_PHOTOSHOP_2021      => __('generated.adobe_photoshop_2021'),
            self::MICROSOFT_365             => __('generated.microsoft_365'),
            self::SQL                       => __('generated.sql'),
            self::CYBERSECURITY             => __('generated.cybersecurity'),
            self::REVIT_ARCHITECTURE        => __('generated.revit_architecture'),
            self::SALESFORCE                => __('generated.salesforce'),
            self::REACTJS                   => __('generated.reactjs'),
            self::GOOGLE_SLIDES             => __('generated.google_slides'),
            self::JAVASCRIPT                => __('generated.javascript'),
            self::ACCESS_2019               => __('generated.access_2019'),
            self::ACCOUNTING_FINANCE        => __('generated.accounting_finance'),
            self::MATHEMATICS               => __('generated.mathematics'),
            self::SAFETY_HYGIENE            => __('generated.safety_hygiene'),
            self::EXCEL_MICROSOFT_365       => __('generated.excel_microsoft_365'),
            self::WINDOWS_ENVIRONMENT       => __('generated.windows_environment'),
            self::MEDICAL_SECRETARY         => __('generated.medical_secretary'),
            self::COBOL                     => __('generated.cobol'),
            self::WEB_DEVELOPER             => __('generated.web_developer'),
            self::TEAMS                     => __('generated.teams'),
            self::ONEDRIVE                  => __('generated.onedrive'),
            self::SHAREPOINT                => __('generated.sharepoint'),
            self::PSYCHOTECHNICAL_TESTS     => __('generated.psychotechnical_tests'),
            self::POWER_BI                  => __('generated.power_bi'),
            self::CUSTOMER_SERVICE          => __('generated.customer_service'),
            self::FRENCH_FOREIGN_LANGUAGE   => __('generated.french_foreign_language'),
            self::WORD_MICROSOFT_365        => __('generated.word_microsoft_365'),
            self::IA_ACT                    => __('generated.ia_act'),
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
