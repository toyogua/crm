<?php

   
    echo form_open('Producto/update/'.$producto->idProducto);
   // echo $producto->descripcionProducto;
    
?>

<div class="container "align="center">
<a  href="<?php echo base_url(); ?>Producto/"><input class="btn btn-primary" type="button" value="Volver" name="submit" /></a>
</div>


    <br><div><h1 align="center" class="text-transparent">ACTUALIZAR PRODUCTO </h1></div>


    <br>
    <div class="container" aling="center">
    
           <div class=" container form-group col col-lg-4">



                <?php echo form_label('Nombre 100'); ?>
                <?php
                $data = array(
                    'class'         => 'form-control',
                    'name'          => 'nombreProducto',
                    'placeholder'   => 'ingrese el nombre',
                    'value'         => $producto->nombreProducto

                );
                ?>
                <?php echo form_input($data); ?>
                <?php echo form_error('nombreProducto', '<p class="alert alert-warning">', '</p>') ?>

            </div>
        <div class="container form-group col col-lg-4">

            <?php echo form_label('Descripcion'); ?>
                    <?php
                    $data = array(
                        'class'         => 'form-control',
                        'name'          => 'descripcionProducto',
                        'placeholder'   => 'ingrese el descripcion',
                        'type'          => 'text',
                        'value'         => $producto->descripcionProducto
                        //'value'         => $producto_data->descripcionProducto


                    );
                    ?>
                    <?php echo form_input($data); ?>
            <?php echo form_error('descripcionProducto', '<p class="alert alert-warning">', '</p>') ?>

                </div>

        <div class="container form-group col col-lg-4">

            <?php echo form_label('Problema reparacion'); ?>
            <?php
            $data = array(
                'class'         => 'form-control',
                'name'          => 'txtReparacion',
                'type'          => 'textarea',
                'placeholder'   => 'Ploblema a reparacion',
                'value'         => $producto->descripcionReparacion


            );
            ?>
            <?php echo form_input($data); ?>
            <?php echo form_error('txtReparacion', '<p class="alert alert-warning">', '</p>') ?>


        </div>
    <div class="container form-group col col-lg-4">

    <?php echo form_label('Estado'); ?>

        <?php

        $opciones = array (

        'REPARANDO'             => 'En reparacion',
        'REPARADO'             => 'Reparado'
        );

        $data = array(

        'class'         => 'form-control',
        'name'          => 'txtEstado',
        // 'placeholder'   => 'Escribe tu numero de Cheque',
        // 'value'         => set_value('numcheque')
        'value'         => $producto->estado

        );

        ?>
        <?php echo form_dropdown($data, $opciones); ?>


                <div class="container col col-lg-1">
                            <?php
                            $data = array(

                                'class'         => 'btn btn-success',
                                'name'          => 'submit',
                                'value'         => 'Producto'

                            );
                            ?>
                <?php echo form_submit($data); ?>
                </div>
            </div><br><br>
<?php
    echo form_close();

?>

