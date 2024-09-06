<?php
    function calcular_descuento($total_compra){
        if($total_compra < 100){
            $descuento = 0 * $total_compra;
        } elseif ($total_compra>=100 && $total_compra<=500){
            $descuento = 0.05 * $total_compra;
        } elseif ($total_compra>=501 && $total_compra<=1000){
            $descuento = 0.10 * $total_compra;
        } elseif ($total_compra>100){
            $descuento = 0.15 * $total_compra;
        }
        return $descuento;
    }

    function aplicar_impuesto($subtotal){
        $impuesto = 0.07;
        $total_impuesto = $impuesto * $subtotal;
        return $total_impuesto;
    }

    function calcular_total($subtotal, $descuento, $impuesto){
        $total_pago = $subtotal + $impuesto - $descuento;
        return $total_pago;
    }
?>