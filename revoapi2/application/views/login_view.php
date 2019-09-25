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
                    </p>
                    <h1>Login</h1>
                </div>

                <form>
                      
                    <?php  
                    echo form_open('Main/login_action');  
                  
                    echo validation_errors();  
                    ?>
                    <div type="text" class="fadeIn second">
                    <?php
                        $opts = 'placeholder="Usuario"';
                        echo form_input('username', $this->input->post('username'), $opts);  
                    ?>
                    </div>

                    <div type="text" class="fadeIn third">
                    <?php
                        $opts = 'placeholder="Contraseña"';
                        echo form_input('username', $this->input->post('username'), $opts);  
                    ?>
                    </div>

                    <input type="text" id="password" class="fadeIn third" name="password" placeholder="Contraseña">
                    <input type="submit" id="login_submit" class="fadeIn fourth" value="Login">
                    <?php

                    //echo form_input('username', $this->input->post('username'));  
                  
                    //echo form_password('password');  
                  
                    //echo form_submit('login_submit', 'Login');  
                  
                    echo form_close();  
                  
                    ?>  
                </form>

                 <div id="formFooter">   
                    <a class="underlineHover" href='<?php echo base_url()."index.php/Main/signin"; ?>'>Sign In</a>
                </div>

                </div>
            </div>
        </div>    
    </body>  
</html>    