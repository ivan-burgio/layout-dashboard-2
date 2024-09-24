<?php

namespace App\Helpers;

class Helper
{
    public static function calcularPorcentaje($total, $cantidad)
    {
        if ($total == 0) {
            return 0;
        }

        $porcentaje = ($cantidad / $total) * 100;
        return round($porcentaje, 2);
    }
}
