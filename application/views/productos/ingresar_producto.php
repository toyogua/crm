<?php

    echo form_open("/Producto/insertarDatos");
?>
<div class="container "align="center">
<a  href="<?php echo base_url(); ?>Producto/"><input class="btn btn-primary" type="button" value="Volver" name="submit" /></a>
</div>



    <br><div><h1 align="center" class="text-transparent">CREAR PRODUCTO </h1></div>


    <br>
    <div class="container" aling="center">
           <div class=" container form-group col col-lg-4">



                <?php echo form_label('Nombre'); ?>
                <?php
                $data = array(
                    'class'         => 'form-control',
                    'name'          => 'nombreProducto',
                    'placeholder'   => 'ingrese el nombre',
                    'value'         => set_value('Nombre')

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
                        'type'          => 'text'


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
                'placeholder'   => 'Ploblema a reparacion'


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
        'name'          => 'txtEstado'
        // 'placeholder'   => 'Escribe tu numero de Cheque',
        // 'value'         => set_value('numcheque')

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