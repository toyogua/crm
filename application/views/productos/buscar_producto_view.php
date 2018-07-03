<?php
echo form_open('Producto/buscarProducto');
// echo $producto->descripcionProducto;

?>
    <div class="container">
  
    <table>
    <tr>
        <th class="th-lg">Buscar Producto</th>
        <th class="th-lg"><div class=" col-8 col-lg-8"><input type="text" class=" form-control" name="txtBuscar" id="nombreCarrera" placeholder="ingrese token"></div></th>
        <th class="th-lg"><div class=" col-2 col-lg-2"><button type="submit" id="submit" name="submit" class="btn btn-primary">Buscar</button></div></th>  <?phpecho form_close();?>
        <th>
        
       </th>
    


    </tr>
    </thead>

    </table></div>