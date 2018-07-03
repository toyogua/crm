<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Autenticacion
    </title>

</head>
<body>

<form action="<?php echo base_url() ?>Login/login1" method="POST">
    <table>
        <tr>
            <td><label>Usuario</label></td>
            <td><input type="text" name="txtUsuario"></td>
        </tr>
        <tr>
            <td><label>Contraseña</label></td>
            <td><input type="password" name="txtClave"></td>
        </tr>
        <tr>
            <td><input type="submit" value="entrar"></td>
        </tr>
    </table>
</form>

</body>
</html>