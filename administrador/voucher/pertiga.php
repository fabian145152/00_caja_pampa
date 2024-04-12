<?php
$hoy = new DateTime();
$dia_del_ano = (int)$hoy->format('z');
//echo "<br>";
// Calcular los días restantes hasta el día 101
$numero = 41;

echo $dias_restantes = $numero - $dia_del_ano;

// Verificar si quedan 3, 2 o 1 día(s) para el día 101 y mostrar un mensaje apropiado

if ($dias_restantes == -7) {
    echo "<h1>!Quedan 7 dias para el voncimiento de la licencia!</h1>";
} elseif ($dias_restantes == -3) {
    echo "<h1>¡Quedan 3 días para el Vencimiento de la licencia!</h1>";
} elseif ($dias_restantes == -2) {
    echo "<h1>¡Quedan 2 días para el Vencimiento de la licencia!</h1>";
} elseif ($dias_restantes == -1) {
    echo "<h1>¡Queda 1 día para el Vencimiento de la licencia!</h1>";
}

if ($dias_restantes >= 0) {
    include "../../config/men.ini";
    exit();
}
