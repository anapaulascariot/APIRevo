    <!DOCTYPE html>  
    <html>  
    <head>  
        <title></title>  
    </head>  
    <body>  
        <h1>Bienvenido. Has ingresado con éxito</h1>  
      
        <?php  
        echo "<pre>";  
        echo print_r($this->session->all_userdata());  
        echo "</pre>";  
        ?>  
      
        <a href='<?php echo base_url()."index.php/Main/logout"; ?>'>Salir</a>  
        <a href='<?php echo base_url()."index.php/Main/charts1"; ?>'>Graficos</a>  
         <a href='<?php echo base_url()."index.php/Main/formulario"; ?>'>Formulario</a>  
      
    </body>  
    </html>  


    ////

        <div class="pull-left">

            <h2>Bienvenido</h2>

        </div>



<table class="table table-bordered">


  <thead>

      <tr>
          <th>Número</th>

          <th>Pregunta</th>

           <th>Enlace</th>

      </tr>

  </thead>


  <tbody>

   <?php foreach ($data as $item) { ?>      

      <tr>
          <td><?php echo $item->idpregunta; ?></td>
          <td><?php echo $item->pregunta; ?></td>    

      <td>




        

          

          <a class="btn btn-info" href="<?php echo base_url('/index.php/Main/formulario/'.$item->idpregunta) ?>"> Mostrar</a>

        </form>

      </td>     

      </tr>

      <?php } ?>

  </tbody>


</table>