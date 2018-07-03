<div class="offset-1 col-10 col-lg-10">
    <br><div><h1 align="center" class="text-transparent">BUSCAR PRODUCTO</h1></div>




    <a  href="<?php echo base_url(); ?>Producto/"><input class="btn btn-primary" type="button" value="Volver" name="submit" /></a>


    <div>
        <!--            --><?php //if($eror==1): ?>
        <!--                <div class="col-xs-5">-->
        <!--                    <p class="bg-danger">Alumno no encontrado</p>-->
        <!--                </div>-->
        <!--            --><?php //endif; ?>

        <table class="table table-striped table table-hover">

            <tr>


                <th>
                    <h5 align="center">nombreProducto</h5>
                </th>

                <th>
                    <h5 align="center">descripcionProducto</h5>
                </th>

                <th>
                    <h5 align="center">fechaCreacion</h5>
                </th>
                <th>
                    <h5 align="center">descripcionReparacion</h5>
                </th>
                <th>
                    <h5 align="center">estado</h5>
                </th>
            </tr>

            <?php foreach($data_Producto as $producto): ?>


                <tr class="list-group-item-info">
                    <td align="center"><?php echo $producto->nombreProducto; ?></td>
                    <td align="center"><?php echo $producto->descripcionProducto; ?></td>
                    <td align="center"><?php echo $producto->fechaCreacion; ?></td>
                    <td align="center"><?php echo $producto->descripcionReparacion; ?></td>
                    <td align="center"><?php echo $producto->estado; ?></td>

                </tr>
            <?php endforeach; ?>


        </table>

    </div>




