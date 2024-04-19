<?php
// Verifica si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se han enviado datos de usuario y contraseña
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $usuario = $_POST['username'];
        $contraseña = $_POST['password'];

        // Ruta al archivo de texto
        $archivo = '../data/usuarios.txt';

        // Verifica si el archivo existe
        if (file_exists($archivo)) {
            // Lee el contenido del archivo y lo guarda en un array
            $usuarios = file($archivo, FILE_IGNORE_NEW_LINES);

            // Recorre el array para buscar coincidencias
            foreach ($usuarios as $linea) {
                list($usuario_archivo, $contraseña_archivo) = explode(':', $linea);
                // Compara el usuario y la contraseña enviados con los almacenados
                if ($usuario == $usuario_archivo && $contraseña == $contraseña_archivo) {
                    // Coincidencia encontrada, redirige a otra página
                    header("Location: ../HTML/index.html");
                    exit;
                }
            }
            // Si no se encuentra una coincidencia, muestra un mensaje de error
            header("location: ../HTML/login.html");
        } else {
            echo "No se pudo encontrar el archivo de usuarios.";
        }
    } else {
        echo "Por favor, ingresa usuario y contraseña.";
    }
} else {
    // Si se intenta acceder al script directamente sin enviar datos por POST, redirige a otra página
    header("Location: formulario.html");
    exit;
}
?>
