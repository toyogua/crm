<?php
/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 25/06/2018
 * Time: 9:20
 */?>

<br>
    <form class="text-transparent container form-group col col-lg-3" action="<?php echo base_url() ?>login/registrar" method="POST">
        <table>
            <tr>
                <td><label class="text-transparent ">Nombre</label></td>
                <td><input class="form-control" type="Text" name="txtNombre"></td>
            </tr>
            <tr>
                <td><label class="text-transparent">Apellido</label></td>
                <td><input class="form-control" type="Text" name="txtApellido" required></td>
            </tr>
            <tr>
                <td><label class="text-transparent">Email</label></td>
                <td><input class="form-control" type="Email" name="txtEmail" required></td>
            </tr>
            <tr>
                <td><label class="text-transparent">Usuario</label></td>
                <td><input class="form-control" type="text" name="txtUsuario" required></td>
            </tr>
            <tr>
                <td><label class="text-transparent">Contraseña</label></td>
                <td><input class="form-control" type="password" name="txtClave" required></td>
            </tr>
            <tr>
                <td><input class="btn btn-success" type="submit" value="entrar"></td>
            </tr>
        </table>
    </form>


</body>
</html>





