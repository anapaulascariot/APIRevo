    <!DOCTYPE html>  
    <html lang="en">  
    <head>  
        <meta charset="utf-8">  
        <title>Página de login</title>  
        <script type="text/javascript" src="../js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"></link>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"></link>
        <link rel="stylesheet" type="text/css" href="../css/formato.css"></link>
    </head>  
    <body>  
        <div class="container">
                <div class="wrapper fadeInDown">
                <div id="formContent">

                <div class="fadeIn first">
                    <h1>Login</h1>
                </div>
                      
                    <?php  
                  
                    echo form_open('Main/login_action');  
                  
                    echo validation_errors();  
                    ?>
                    <label for="fadeIn second">Usuario:</label>
                    <?php
                    //echo "<p>Usuario: ";

                    echo form_input('username', $this->input->post('username'));  

                     echo "</p>";  
                  
                    echo "<p>Contraseña: ";  
                        echo form_password('password');  
                    echo "</p>";  
                  
                    echo "</p>";  
                    echo form_submit('login_submit', 'Login');  
                    echo "</p>";  
                  
                    echo form_close();  
                  
                    ?>  
                    </div>
              

                 <div id="formFooter">   
                <a class="underlineHover" href='<?php echo base_url()."index.php/Main/signin"; ?>'>Sign In</a> 
                </div>


                </div>
                </div>
            
        </div>    
    </body>  
    </html>    