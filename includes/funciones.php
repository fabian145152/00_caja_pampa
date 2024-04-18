<?PHP

//actualiza_semana();


function leerArchivoTXT($rutaArchivo)
{
    // Verificar si el archivo existe
    if (file_exists($rutaArchivo)) {
        // Leer el contenido del archivo
        $contenido = file_get_contents($rutaArchivo);
        return $contenido;
    } else {
        return "El archivo no existe.";
    }
}
