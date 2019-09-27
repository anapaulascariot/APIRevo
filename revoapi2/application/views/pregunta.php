<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2> Mostrar elemento <?php echo $preguntas->idpregunta?></h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="<?php echo base_url('data.php');?>"> Regresar</a>

        </div>

    </div>

</div>


<table class="table table-bordered">


  <thead>

      <tr>
          <th>Número</th>

          <th>Respuesta</th>

           <th>Votos</th>

           <th>Idpregunta</th>

      </tr>

  </thead>


  <tbody>

   <?php 
    echo $preguntas->pregunta;
   foreach ($datos as $item) {
   echo "<tr>"; 
   
   foreach ($item as $basurilla) {
     //$arreglo[]=$basurilla;
      echo "<td>";
      echo $basurilla;
       echo "</td>";

    } 
    
    }
    ?>      
 
  <!--         <td><?php echo $item->idpregunta; ?></td>
          <td><?php echo $item->pregunta; ?></td>        -->

      

      <?php ?>
      </tr>
  </tbody>


</table>