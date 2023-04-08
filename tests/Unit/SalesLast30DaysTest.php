<?php

namespace Tests\Unit;

use App\Domain\Models\FacturasAPagar;
use Tests\TestCase;

class SalesLast30DaysTest extends TestCase
{

    public function testFacturasAPagarcreation()
    {
        $facturasApagar = new FacturasAPagar(10, 1000.0, now()->subDays(30), now());

        $this->assertInstanceOf(FacturasAPagar::class, $facturasApagar);
        $this->assertSame(10, $facturasApagar->numeroFacturas);
        $this->assertSame(1000.0, $facturasApagar->importeTotal);

        $esperadoFechaDesde = now()->subDays(30)->setTime(0, 0, 0, 0);
        $actualFecha = $facturasApagar->fechaDesde->setTime(0, 0, 0, 0);
        $this->assertEquals($esperadoFechaDesde, $actualFecha);
    }

}
