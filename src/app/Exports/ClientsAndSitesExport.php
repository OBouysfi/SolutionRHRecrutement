<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ClientsAndSitesExport implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array
    {
        return [
            'Clients' => new ClientsExport(),
//            'Sites' => new ClientSitesExport(),
//            'Evaluateurs' => new ClientsEvaluateursExport(),
        ];
    }
}
