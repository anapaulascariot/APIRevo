
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="utf-8">  
    <title>Nuevo Usuario</title>  
    <script type="text/javascript" src="http://localhost/revoapi2/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/revoapi2/css/bootstrap.css"></link>
    <link rel="stylesheet" type="text/css" href="http://localhost/revoapi2/css/bootstrap.min.css"></link>
    <link rel="stylesheet" type="text/css" href="http://localhost/revoapi2/css/formato.css"></link>
</head>  
<body>  
    <div class="container">
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <form method="post" action="<?php echo base_url('index.php/Main/alta_usuario');?>">
                <div class="fadeIn first">
                    </p>
                    <h1>Nuevo Usuario</h1>
                    </p>
                </div>

                <?php  

                echo form_open('Main/signin_validation');  

                echo validation_errors();  

                $opts_user =  array('placeholder' => 'Usuario', 'class' => 'fadeIn second', 'type' => 'text');
            //echo "<p>Username:";  
                echo form_input('email', '', $opts_user);  
                echo "</p>";  

            //echo "<p>Password:";  
                $opts_pass = array('placeholder'=>'Contraseña', 'class'=>'fadeIn third', 'type' => 'password');
                echo form_password('password', '', $opts_pass);  
                echo "</p>";  

            //echo "<p>Confirm Password:";  
                $opts_confirmpass = array('placeholder'=>'Confirme Contraseña', 'class'=>'fadeIn Fourth', 'type' => 'password');
                echo form_password('cpassword', '', $opts_confirmpass);  
                echo "</p>";  

                echo "<p>";  
                echo form_submit('signin_submit', 'Registrar', 'class=fadeIn Fifth');  
                echo "</p>";  

                echo form_close();  

                ?>  
            </form>
            </div>
        </div>
    </div>  
</body>  
</html>  