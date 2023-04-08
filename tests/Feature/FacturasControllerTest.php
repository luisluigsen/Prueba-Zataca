<?php

namespace Tests\Feature;

use App\Domain\Repository\FacturasApagarInterfaz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FacturasControllerTest extends TestCase
{
    public function testObtenerUltimasFacturas()
    {
        $repositoryMock = $this->createMock(FacturasApagarInterfaz::class);

        $repositoryMock->method('facturasApagar')
            ->willReturn([
                'numeroFacturas' => 5,
                'importeTotal' => 500.0,
                'fechaDesde' => now()->subDays(30),
                'fechaHasta' => now(),
            ]);

        $this->app->instance(FacturasApagarInterfaz::class, $repositoryMock);

        $response = $this->get('/web/facturacion/facturas-impagadas.php');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'numeroFacturas',
                'importeTotal',
                'fechaDesde',
                'fechaHasta',
            ]);
    }
}
