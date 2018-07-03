<?php
/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 26/06/2018
 * Time: 17:01
 */
   
 echo form_open('Producto/buscarProducto');
// echo $producto->descripcionProducto;
 
?>
    <div class="container">
  
    <table>
    <tr>
        <th class="th-lg">Buscar Producto</th>
        <th class="th-lg"><div class=" col-8 col-lg-8"><input type="text" class=" form-control" name="txtBuscar" id="nombreCarrera" placeholder="ingrese token"></div></th>
        <th class="th-lg"><div class=" col-2 col-lg-2"><button type="submit" id="submit" name="submit" class="btn btn-primary">Buscar</button></div></th> 
        <?php echo form_error('txtBuscar', '<p class="alert alert-warning">', '</p>');
         echo form_close();?>
        <th>
        <a  href="<?php echo base_url(); ?>Producto/insert"><input class="btn btn-primary" type="button" value="Nuevo Producto" name="submit" /></a>
       </th>
    


    </tr>
    </thead>

    </table></div>



<div class="container table-responsive">
<table class="animated bounce container table-responsive-md table table-hover">
    <thead class="cyan lighten-3">
    <tr class="table-active" >
        <th class="th-lg">Nombre</th>
        <th class="th-lg">Descripcion</th>
        <th class="th-lg">Motivo Reparacion</th>
        <th class="th-lg">Estado</th>
        <th class="th-lg">Token</th>
        <th class="th-lg">Fecha ingreso</th>


    </tr>
    </thead>

<?php

    foreach($producto_data as $producto) {

        ?>

    <tbody>

            <tr>
                <td scope="row">
                    <?php
                    echo  $producto->nombreProducto
                    ?>
                </td>
                <td scope="row">
                    <?php
                    echo  $producto->descripcionProducto
                    ?>
                </td>
                <td scope="row">
                    <?php
                    echo  $producto->descripcionReparacion
                    ?>
                </td>
                <td scope="row">
                    <?php
                    echo  $producto->estado
                    ?>
                </td>
                <td scope="row">
                    <?php
                    echo  $producto->numeroGenerado
                    ?>
                </td>
                <td scope="row">
                    <?php
                    echo  $producto->fechaCreacion
                    ?>
                </td>
                <td ><a align="center" class="animated swing fa fa-trash-o red-text" aria-hidden="true" title="Eliminar" href="<?php echo base_url();?>Producto/eliminar/<?php echo $producto->idProducto; ?>">Borrar </a></td>
                <td ><a align="center" class="animated bounce fa fa-edit blue-text" TITLE="Editar" href="<?php echo base_url(); ?>Producto/edit/<?php echo $producto->idProducto; ?>"></a></td>

            </tr>
           </tbody>
        <?php
    }
?>
    </table>
</div>