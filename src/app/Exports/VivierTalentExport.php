<?php

namespace App\Exports;

use App\Models\Profile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class VivierTalentExport implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    public function collection()
    {
        return Profile::where('is_talented', true)
        ->with(['formations.diploma', 'formations.option', 'profession'])
        ->get()
        ->map(function ($profile) {
            $formations = $profile->formations;
    
            $formationDiplomas = $formations->map(function ($formation) {
                return $formation->diploma ? $formation->diploma->label : '-';
            })->implode(', ');
    
            $formationOptions = $formations->map(function ($formation) {
                return $formation->option ? $formation->option->label : '-';
            })->implode(', ');
    
            return [
                'matricule' => $profile->matricule,
                'first_name' => $profile->first_name,
                'last_name' => $profile->last_name,
                'formations_diploma' => $formationDiplomas ?: ' - ',
                'formations_option' => $formationOptions ?: ' - ',
                'total_experience_in_years' => $profile->total_experience_in_years,
                'profession' => $profile->profession ? $profile->profession->label : ' - ',
                'desired_profile'=> $profile->desired_profile ?: ' - ' ,
                'created_at' => $profile->created_at->format('Y-m-d'),
                'updated_at' => $profile->updated_at->format('Y-m-d'),
            ];
        });
    
    }
    

    public function headings(): array
    {
        return [
            'Matricule',
            'Prenom',   
            'Nom',      
            'diploma',
            'option',
            'Experience Totale en Annees',
            'Pote actuel',
            'Poste souhaite',
            'Cree Le',
            'Mis a Jour Le'
        ];
    }

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

    public function title(): string
    {
        return 'Listes Vivier Talents';
    }
}
