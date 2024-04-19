<?php
// Verifica si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se han enviado datos de usuario y contraseña
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        $usuario = $_POST['username'];
        $contraseña = $_POST['password'];
        $confirmar_contraseña = $_POST['confirm_password'];

        // Verifica si las contraseñas coinciden
        if ($contraseña !== $confirmar_contraseña) {
            echo "Las contraseñas no coinciden.";
            exit; // Detiene el script si las contraseñas no coinciden
        }

        // Directorio donde se guardará el archivo
        $directorio = '../data/';
        $archivo = $directorio . 'usuarios.txt';

        // Verifica si el directorio existe, si no, lo crea
        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true); // Crea el directorio con permisos de escritura
        }

        // Abre el archivo para escritura (si no existe, lo crea)
        $fp = fopen($archivo, 'a'); // 'a' para agregar contenido al final del archivo

        // Verifica si el archivo se abrió correctamente
        if ($fp === false) {
            echo "No se pudo abrir el archivo $archivo.";
            exit;
        }

        // Guarda los datos en el archivo
        $contenido = "$usuario:$contraseña\n";
        if (fwrite($fp, $contenido) === false) {
            echo "Error al escribir en el archivo.";
            exit;
        }

        // Cierra el archivo
        fclose($fp);

        header("location: ../HTML/login.html");
    } else {
        echo "Por favor, ingresa usuario y contraseña.";
    }
}
?>


