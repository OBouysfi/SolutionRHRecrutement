<?php

namespace App\Exports;

use App\Models\Skill;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class CompetenceTechniqueExport implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    public function collection()
    {
        return Skill::with('skillType')
            ->whereHas('skillType', function ($query) {
                $query->where('parent_id', 1); 
            })
            ->get()
            ->map(function ($skill_personnelle) {
                return [
                    'label' => $skill_personnelle->label,
                    'skill_type' => optional($skill_personnelle->skillType)->label ?? '-',
                ];
            });
    }
    public function headings(): array
    {
        return [
            'Competence Technique',
            'Catégorie'
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
        return 'Liste des Competences Technique';
    }
}
