<?php

namespace App\Application\UseCase;

use App\Domain\Models\FacturasAPagar;
use App\Domain\Repository\FacturasApagarInterfaz;

class FacturasImpagadasServicio
{
    private $facturasApagarInterface;

    public function __construct(FacturasApagarInterfaz $facturasApagarInterface)
    {
        $this->facturasApagarInterface = $facturasApagarInterface;
    }

    public function facturasData(): FacturasAPagar
    {
        $salesData = $this->facturasApagarInterface->facturasApagar();

        return new FacturasAPagar
        (
        $salesData['numeroFacturas'],
        $salesData['importeTotal'],
        $salesData['fechaDesde'],
        $salesData['fechaHasta']
        );
    }
}
