<?php

namespace App\Exports;

use App\Models\Matching;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class MatchingExport implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    public function collection()
    {
        return Matching::with('profile.formations.option','profile.formations.diploma')->get()
        ->map(function ($match) {

            $formations = $match->profile->formations ?? collect(); 

            $formationDiplomas = $formations->map(function ($formation) {
                return optional($formation->diploma)->label ?? '-';
            })->implode(', ');

            $formationOptions = $formations->map(function ($formation) {
                return optional($formation->option)->label ?? '-';
            })->implode(', ');
    
            return [
                'matricule' => $match->profile->matricule,
                'first_name' => $match->profile ? $match->profile->first_name : ' - ',
                'last_name' => $match->profile ? $match->profile->last_name : ' - ',
                'diploma_label' =>$formationDiplomas ??' - ',
                'option' => $formationOptions ?? ' - ',
                'total_experience' => $match->profile ? $match->profile->total_experience_in_years . ' ans'  : ' - ',
                'current_profession' => $match->profile->profession ? $match->profile->profession->label : ' - ',
                'desired_profession' => $match->profile ? $match->profile->desired_profile : ' - ',
                'created_at' => $match->profile->created_at ?? ' - ',
                'updated_at' => $match->updated_at ?? ' - ',
                
            ];
        });
    }
    public function headings(): array
    {
        return [
            'Reference ',
            'Prenom',
            'Nom',
            'Diplome',
            'Option',
            'Experience',
            'Poste actuel',
            'Poste souhaite',
            'Depot CV',
            'Modification' 
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
        return 'Liste des profils correspondants';
    }
}
