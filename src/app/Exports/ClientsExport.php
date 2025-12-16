<?php

namespace App\Exports;

use App\Enums\Client\JuridicalFormEnum;
use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class ClientsExport implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    /**
     * Retourne la collection de données à exporter
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Client::with(['finance'])->get()
            ->map(function ($client) {

                return [
                    'matricule' => $client->id,
                    'Raison sociale' => $client->name,
                    'Forme juridique' => JuridicalFormEnum::getValue($client->juridical_form),
                    'Régime fiscal' => $client->tax_regime ?? '',
                    'Secteur' => $client->activity ?? '',
                    'Activité' => $client->activity ?? '',
                    'Adresse' => $client->address ?? '',
                    'Code postal' => $client->postal_code ?? '',
                    'Ville' => $client->city->name ?? '',
                    'RC Numéro' => $client->finance->rc ?? '',
                    'RC Ville' => $client->finance->rc_city ?? '',
                    'ICE' => $client->finance->ice ?? '',
                    'Identifiant fiscal' => $client->finance->unique_identifier ?? '',
                    'Taxe Pro' => $client->finance->taxe ?? '',
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
            'Raison sociale',
            'Forme juridique',
            'Régime fiscal',
            'Secteur',
            'Activité',
            'Adresse',
            'Code postal',
            'Ville',
            'RC Numéro',
            'RC Ville',
            'ICE',
            'Identifiant fiscal',
            'Taxe Pro',
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
        return 'Listes CLIENTS';
    }
}
