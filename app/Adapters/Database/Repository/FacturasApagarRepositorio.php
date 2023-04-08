<?php

namespace App\Adapters\Database\Repository;

use App\Domain\Repository\FacturasApagarInterfaz;
use Illuminate\Support\Facades\DB;

class FacturasApagarRepositorio implements FacturasApagarInterfaz
{

    public function facturasApagar(): array
    {
        $fechaDesde = now()->subDays(30);
        $fechaHasta = now();

        $numeroFacturas = DB::table('facturasapagar')
            ->where('numerofacturas', true)
            ->where('fechadesde', '>=', $fechaDesde)
            ->count();

        $importeTotal = DB::table('facturasapagar')
            ->where('importetotal', true)
            ->where('fechadesde', '>=', $fechaDesde)
            ->count();


        return [
            'numeroFacturas' => $numeroFacturas,
            'importeTotal' => $importeTotal,
            'fechaDesde' => $fechaDesde,
            'fechaHasta' => $fechaHasta
        ];
    }

}
