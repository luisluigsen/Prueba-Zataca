<?php

namespace App\Domain\Models;

class FacturasAPagar
{
    public $numeroFacturas;
    public $importeTotal;
    public $fechaDesde;
    public $fechaHasta;

    public function __construct(
        $numeroFacturas,
        $importeTotal,
        $fechaDesde,
        $fechaHasta
    ) {
        $this->numeroFacturas = $numeroFacturas;
        $this->importeTotal = $importeTotal;
        $this->fechaDesde = $fechaDesde;
        $this->fechaHasta = $fechaHasta;
    }

    public function getNumeroFacturas() {
        return $this->numeroFacturas;
    }

    public function getImporteTotal() {
        return $this->importeTotal;
    }

    public function getFechaDesde() {
        return $this->fechaDesde;
    }

    public function getFechaHasta() {
        return $this->fechaHasta;
    }

}
