<?php
class multiplicar {
    public static function generarTabla($numero) {
        $tabla = [];
        for ($i = 1; $i <= 12; $i++) {
            $tabla[] = [
                'multiplicador' => $i,
                'resultado' => $numero * $i
            ];
        }
        return $tabla;
    }
}