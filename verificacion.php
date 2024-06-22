<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $edad = $_POST['edad'];
    $errores = '';

    if (empty($user)) {
        $errores .= 'El campo usuario es obligatorio.<br>';
    }

    if (empty($password)) {
        $errores .= 'El campo contraseña es obligatorio.<br>';
    }

    if (empty($edad)) {
        $errores .= 'El campo edad es obligatorio.<br>';
    } elseif (!is_numeric($edad) || $edad < 18) {
        $errores .= 'Debe ser mayor de edad (18 años o más) y la edad debe ser un número válido.<br>';
    }

    if ($user !== 'luis') {
        $errores .= 'El usuario es incorrecto.<br>';
    }

    if ($password !== 'mendoza') {
        $errores .= 'La contraseña es incorrecta.<br>';
    }

    if ($errores) {
        echo '<h3>Errores:</h3>';
        echo '<div class="error">' . $errores . '</div>';
    } else {
        echo '<h3>Login exitoso!</h3>';
    }
}
?>