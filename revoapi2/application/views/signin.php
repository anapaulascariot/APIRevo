
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="utf-8">  
    <title>Sign Up</title>  
    <script type="text/javascript" src="http://localhost/APIrevo/revoapi2/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/APIrevo/revoapi2/css/bootstrap.css"></link>
    <link rel="stylesheet" type="text/css" href="http://localhost/APIrevo/revoapi2/css/bootstrap.min.css"></link>
    <link rel="stylesheet" type="text/css" href="http://localhost/APIrevo/revoapi2/css/formato.css"></link>
</head>  
<body>  
    <div class="container">
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <div class="fadeIn first">
                    </p>
                    <h1>Sign In</h1>
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
                echo form_submit('signin_submit', 'Sign In', 'class=fadeIn Fifth');  
                echo "</p>";  

                echo form_close();  

                ?>  

            </div>
        </div>
    </div>  
</body>  
</html>  