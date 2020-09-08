<?php


 /*
  - Google Recaptcha Integration PHP
  - Script Writed By : Bishoy Hanna 
 */

# Sitekey , Secret key Get From Google Recaptcha admin Console (https://www.google.com/recaptcha/about/)

$SiteKey = "6LdiOrsZAAAAAOE5hLFlO1c8OoGO7hvMxn3mhHj0";
$SecretKey = "6LdiOrsZAAAAAPjCa7cy5KSGfQJJ2pU5jLBL50zu";


# Check Recaptcha For User

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       if(isset($_POST["SendTest"])){
           
       
                        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                  // Google secret API
                  $secretAPIkey = $SecretKey;
                  
                  // reCAPTCHA response verification
                  $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretAPIkey.'&response='.$_POST['g-recaptcha-response']);
                  
                  // Decode JSON data
                  $response = json_decode($verifyResponse);
                  
                  
                      if($response->success){
                          
                          echo 'Hello User';
                          
                      }
                        }else{
                            echo 'Please verify that you are not a robot
';
                            
                        }
        
        }
    }

?>

  <html>
<head>
      <title>Google Recaptcha Integration PHP</title>
      </head>
      <body>
          <form action="" method="POST">
                                            <div class="g-recaptcha" data-sitekey="<?php echo $SiteKey; ?>"></div>

          <input type="submit" name="SendTest" value="Send ME! ">
          </form>
             <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      </body>
</html>