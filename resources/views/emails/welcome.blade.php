<!DOCTYPE html>
<html>
<body>
    <div style="font-family: Arial, sans-serif; 
    line-height: 1.6;text-align: center; 
    background-color: #ccf9f9; padding: 20px;
    border-radius: 10px; max-width: 600px;
    margin: auto;">
    <h1>Hola, {{ $user->name }}!</h1>
    <p>Gracias por registrarte en nuestra API de Blog.</p>
    <p>Tu correo registrado es: {{ $user->email }}</p>
    <br>
    <p>¡Esperamos que disfrutes el contenido!</p>
    </div>
</body>
</html>