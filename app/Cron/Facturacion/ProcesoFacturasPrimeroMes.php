<?php

namespace App\Cron\Facturacion;

use App\Application\UseCase\FacturasImpagadasServicio;
use App\Domain\Repository\FacturasApagarInterfaz;
use App\Exceptions\ProcesoFacturasPrimeroMesException;
use Illuminate\Console\Command;

class ProcesoFacturasPrimeroMes extends Command
{

    protected $signature = 'facturas:ultimos30dias';


    protected $description = 'Obtener Facturas de los ultimos 30 dias';

    protected $facturasApagarInterfaz;
    protected  $facturasApagarService;
    public function __construct(FacturasApagarInterfaz $facturasApagarInterfaz, FacturasImpagadasServicio $facturasApagarService)
    {
        parent::__construct();
        $this->facturasApagarInterfaz = $facturasApagarInterfaz;
        $this->facturasApagarService = $facturasApagarService;
    }

    private function procesoFacturaPrimerodeMes(): void
    {
        if (now()->day !==1){
         throw new ProcesoFacturasPrimeroMesException();
        }

//        Simulación que hoy es primer dia de mes
//        if (false) {
//            throw new ProcesoFacturasPrimeroMesException();
//        }
    }


    public function handle()
    {
        try {
            $this->procesoFacturaPrimerodeMes();
            $facturas = $this->facturasApagarService->facturasData();

            $this->info('Number de facturas:' . $facturas->getNumeroFacturas());
            $this->info('Importe Total:' . $facturas->getImporteTotal());
            $this->info('Fecha desde:' . $facturas->getFechaDesde());
            $this->info('Fecha hasta:' . $facturas->getFechaHasta());

        }catch (ProcesoFacturasPrimeroMesException $e){
            $this->error($e->getMessage());
        }
    }
}
