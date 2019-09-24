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
      
    </body>  
    </html>  