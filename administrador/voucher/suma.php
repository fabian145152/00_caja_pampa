<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma de números</title>
</head>

<body>
    <h1>Suma de números</h1>
    <input type="text" id="numero1" placeholder="Ingrese el primer número">
    <input type="text" id="numero2" placeholder="Ingrese el segundo número">
    <button onclick="sumar()">Sumar</button>
    <div id="resultado"></div>

    <script>
        function sumar() {
            // Obtener los valores de los campos de entrada
            var num1 = parseFloat(document.getElementById('numero1').value);
            var num2 = parseFloat(document.getElementById('numero2').value);

            // Verificar si los valores son numéricos
            if (!isNaN(num1) && !isNaN(num2)) {
                // Calcular la suma
                var suma = num1 + num2;

                // Mostrar el resultado
                document.getElementById('resultado').innerHTML = 'La suma es: ' + suma;
            } else {
                // Mostrar un mensaje de error si los valores no son numéricos
                document.getElementById('resultado').innerHTML = 'Por favor, ingrese números válidos.';
            }
        }
    </script>
</body>

</html>