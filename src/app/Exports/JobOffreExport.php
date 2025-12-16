<?php

namespace App\Exports;

use App\Enums\JobOffer\StatusJobOfferEnum;
use App\Enums\Profile\ContractTypeProfileEnum;
use App\Models\JobOffer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class JobOffreExport implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    /**
     * Retourne la collection de données à exporter
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return JobOffer::with(['client', 'city', 'diplomas', 'jobOfferExperience'])
            ->get()
            ->map(function ($jobOffer) {
                // Diplômes
                $diplomas = $jobOffer->diplomas->map(function ($diploma) {
                    return $diploma->label ?? '-';
                })->implode(', ');

                // Expérience (somme des années)
                $experienceYears = $jobOffer->jobOfferExperience->sum('years') . ' ans';

                return [
                    'client_number' => $jobOffer->client->id ?? '-',
                    'client_name' => $jobOffer->client->name ?? '-',
                    'title' => $jobOffer->title ?? '-',
                    'contract_type' => ContractTypeProfileEnum::getAbbrValue($jobOffer->contract_type_id) ?? '-',
                    'city_name' => $jobOffer->city->name ?? '-',
                    'diploma_label' => $diplomas ?: '-',
                    'experience_count' => $experienceYears,
                    'start_date' => optional($jobOffer->mission_started_at)->format('d/m/Y') ?? '-',
                    'end_date' => optional($jobOffer->mission_finished_at)->format('d/m/Y') ?? '-',
                    'status_id' => $jobOffer->status_id ?? '-',
                ];
            });
    }


    /**
     * Définition des en-têtes du fichier Excel
     */
    public function headings(): array
    {
        return [
            'N° client',
            'Client',
            'Intitulé du poste',
            'Type de contrat',
            'Localisation',
            'Diplôme',
            'Expérience',
            'Date de début',
            'Date de fin',
            'Statut',
        ];
    }

    /**
     * Applique les styles au fichier Excel
     */
    public function styles(Worksheet $sheet)
    {
        $highestColumn = $sheet->getHighestColumn();
        $highestRow = $sheet->getHighestRow();

        foreach (range('A', $highestColumn) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        return [
            1 => [
                'font' => ['bold' => true],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ],
            'A1:' . $highestColumn . $highestRow => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Définition du titre de l'onglet Excel
     */
    public function title(): string
    {
        return 'Listes Offres d\'emploi';
    }
}
