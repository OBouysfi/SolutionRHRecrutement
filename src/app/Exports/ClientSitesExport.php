<?php

namespace App\Exports;

use App\Models\Profile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class ClientSitesExport implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    /**
     * Retourne la collection de données à exporter
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Client::get()
            ->map(function ($client) {


                $formations = $profile->formations ?? collect();

                $formationDiplomas = $formations->map(function ($formation) {
                    return optional($formation->diploma)->label ?? '-';
                })->implode(', ');

                $formationOptions = $formations->map(function ($formation) {
                    return optional($formation->option)->label ?? '-';
                })->implode(', ');

                return [
                    'matricule' => $profile->matricule,
                    'first_name' => $profile->first_name,
                    'last_name' => $profile->last_name,
                    'formations_diploma' => $formationDiplomas ?: ' - ',
                    'formations_option' => $formationOptions ?: ' - ',
                    'total_experience_in_years' => $profile->total_experience_in_years,
                    'profession' => optional($profile->profession)->label ?? ' - ',
                    'desired_profile' => $profile->desired_profile ?: ' - ',
                    'is_active' => $profile->is_active ? 'Oui' : 'Non',
                    'is_qualified' => $profile->is_qualified ? 'Oui' : 'Non',
                    'created_at' => optional($profile->created_at)->format('Y-m-d'),
                    'updated_at' => optional($profile->updated_at)->format('Y-m-d'),
                ];
            });
    }


    /**
     * Définition des en-têtes du fichier Excel
     */
    public function headings(): array
    {
        return [
            'Matricule',
            'Prenom',
            'Nom',
            'diploma',
            'option',
            'Experience Totale (Annees)',
            'Pote actuel',
            'Poste souhaite',
            'Est Actif',
            'Est Qualifie',
            'Cree Le',
            'Mis à Jour Le'
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
        return 'Listes des sites CLIENTS';
    }
}
