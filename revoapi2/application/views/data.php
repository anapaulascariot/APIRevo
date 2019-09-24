    <!DOCTYPE html>  
    <html>  
    <head> 
        <meta charset="utf-8">
        <title>página de pregunta</title>
        <script type="text/javascript"  src="./js/bootstrap.js"></script> 
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.css"></link> 
    </head>  
    <body>  
        <h1>Bienvenido. PREGUNTA</h1>  
      
        <?php  
        echo "<pre>";  
        echo print_r($this->session->all_userdata());  
        echo "</pre>";  
        ?>  
      
        <a href='<?php echo base_url()."index.php/Main/logout"; ?>'>Salir</a>  
      
    </body>  
    </html>  