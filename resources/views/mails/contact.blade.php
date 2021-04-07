<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje Recibido con exíto</title>
</head>
<body>
    <p>Hola! Mi nombre es: {{$contact->name }}</p>
    <p>Mi email es: {{$contact->email }}</p>
    <p>Mi teléfono es: {{$contact->phone }}</p>
    <p>Te contacto por: {{$contact->message }}</p>
</body>
</html>
