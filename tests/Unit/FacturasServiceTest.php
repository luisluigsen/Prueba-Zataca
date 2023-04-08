<?php

namespace Tests\Unit;

use App\Application\UseCase\FacturasImpagadasServicio;
use App\Domain\Models\FacturasAPagar;
use App\Domain\Repository\FacturasApagarInterfaz;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class FacturasServiceTest extends TestCase
{
    use WithFaker;

    public function  testGenerarServiciosFacturas()
    {
        $repositoryMock = $this->createMock(FacturasApagarInterfaz::class);

        $repositoryMock->method('facturasApagar')
            ->willReturn([
                'numeroFacturas'=>$this->faker->numberBetween(1,100),
                'importeTotal'=>$this->faker->randomFloat(2,1,1000),
                'fechaDesde'=>now()->subDays(30),
                'fechaHasta'=>now()
            ]);

        $facturasReportService= new FacturasImpagadasServicio($repositoryMock);

        $facturasReport = $facturasReportService->facturasData();

        $this->assertInstanceOf(FacturasAPagar::class, $facturasReport);
        $this->assertIsInt($facturasReport->getNumeroFacturas());
        $this->assertIsFloat($facturasReport->getImporteTotal());
        $this->assertInstanceOf(Carbon::class, $facturasReport->getFechaDesde());
        $this->assertInstanceOf(Carbon::class, $facturasReport->getFechaHasta());
    }
}
