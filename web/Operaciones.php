<?php
// Funciones 
function sumar($num1, $num2) {
    return $num1 + $num2;
}

function restar($num1, $num2) {
    return $num1 - $num2;
}

function multiplicar($num1, $num2) {
    return $num1 * $num2;
}

function dividir($num1, $num2) {
    if ($num2 == 0) {
        return "Error: División por cero";
    }
    return $num1 / $num2;
}

// Validar el post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operacion = filter_input(INPUT_POST, 'operacion', FILTER_SANITIZE_STRING);

    // Verificar
    if ($num1 === false || $num2 === false) {
        echo "Error: Entrada de números no válida.";
        exit;
    }

    // Operacion
    switch ($operacion) {
        case 'suma':
            $resultado = sumar($num1, $num2);
            break;
        case 'resta':
            $resultado = restar($num1, $num2);
            break;
        case 'multiplicacion':
            $resultado = multiplicar($num1, $num2);
            break;
        case 'division':
            $resultado = dividir($num1, $num2);
            break;
        default:
            echo "Error: Operación no válida.";
            exit;
    }

    // resultado
    echo "El resultado de la " . $operacion . " es: " . $resultado;
} else {
    echo "Error: Método de solicitud no válido.";
}
?>
