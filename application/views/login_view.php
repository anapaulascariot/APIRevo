
<body>  
    <div class="container">
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <div class="fadeIn first">
                    <img src="http://localhost/apirevo/img/logo-UV2.jpg" id="icon" alt="User Icon" />
                    <h1>Login</h1>
                </div>

                <?php  

                echo form_open('Main/login_action');  

                echo validation_errors();  

                $opts_user =  array('placeholder' => 'Usuario', 'class' => 'fadeIn second', 'type' => 'text');
                echo form_input('username', $this->input->post('username'), $opts_user);  

                //echo "<p>Contraseña: ";  
                $opts_pass = array('placeholder'=>'Contraseña', 'class'=>'fadeIn third', 'type' => 'password');
                echo form_password('password', '', $opts_pass);  

                echo "</p>";  
                echo form_submit('login_submit', 'Login', 'class=fadeIn Fourth');  
                //echo "</p>";  

                echo form_close();  

                ?>  

                <div id="formFooter">   
                    <a class="underlineHover" href='<?php echo base_url()."index.php/Main/signin"; ?>'>Sign In</a>  
                </div>
            </div>
        </div>     