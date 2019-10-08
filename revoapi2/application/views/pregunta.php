<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2> Mostrar elemento <?php echo $preguntayrespuesta[0];?></h2>
            <?php echo print_r($preguntayrespuesta);  ?>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="<?php echo base_url('data.php');?>"> Regresar</a>

        </div>

    </div>

</div>


<table class="table table-bordered">


  <thead>

      <tr>
          <th>Id respuesta</th>

          <th>Respuesta</th
      </tr>

  </thead>


  <tbody>

   <?php 
   
    echo $preguntayrespuesta[1];
      echo "<tr>"; 
   $banderaTr=0;
   for($i=2;$i<count($preguntayrespuesta);$i++){
  
      echo "<td>";
      echo $preguntayrespuesta[$i];
      $banderaTr++; 
       if ($banderaTr==2){
       echo "</tr>";
       $banderaTr=0;
     }
    } 
    
    
    ?>      
 
  <!--         <td><?php echo $item->idpregunta; ?></td>
          <td><?php echo $item->pregunta; ?></td>        -->
  </tbody>


</table>