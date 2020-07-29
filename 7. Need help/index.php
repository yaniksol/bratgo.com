<?php

    $error = ""; $successMessage = "";

    if ($_POST) {
        
        if (!$_POST["email"]) {
            
            $error .= "An email address is required.<br>";
            
        }
        
        if (!$_POST["content"]) {
            
            $error .= "The content field is required.<br>";
            
        }
        
        if (!$_POST["subject"]) {
            
            $error .= "The subject is required.<br>";
            
        }
        
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            
            $error .= "The email address is invalid.<br>";
            
        }
        
        if ($error != "") {
            
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
            
        } else {
            
            $emailTo = "janjic_aljosa@hotmail.com";
            
            $subject = $_POST['subject'];
            
            $content = $_POST['content'];
            
            $headers = "From: ".$_POST['email'];
            
            if (mail($emailTo, $subject, $content, $headers)) {
                
                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';
                
                
            } else {
                
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent - please try again later</div>';
                
                
            }
            
        }
        
        
        
    }

?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      
     <link rel="shortcut icon" type="image/x-icon" href="icon.png">

    <title> Need help? </title>
      
    <style>
         p {
            font-family: Arial, Helvetica, sans-serif;
            }
        .remove-all-margin{
            margin:0 ! important;
            }
        #navbar {
            background-color: #333333;
            }
        .jumbotron {
            background-image:linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)) ,url(bratislava5.jpg);
            margin-top: 60px;
            width:100%;
            height: 580px;
            background-size: cover;
            }
        #uvodniText {
            position: relative;
            top: 40%;
            color: white;
            text-align: center;
            font-weight: bold;
            }
        #about {
            background-color: #F1F1F1;
            width: 100%;
            text-align: center;
            position: relative;
            top: 50px;
            }
        #about1 {
             background-color: #F5F5F5;
             border-color: #F1F1F1 #6C757D #6C757D #6C757D;
             border-style: solid;
             border-width: 1px;
             width: 100%;
             min-height: 1000px;
             text-align: center;
             padding: 55px;
            }
        
    </style>
      
  </head>
    
    <body data-spy="scroll" data-target="#navbar" data-offset="60" >
        
    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top " id="navbar" >
        <a class="navbar-brand" href="#"><img id="logo" src="logo.png"></a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link navbarText" href="http://bratgo.com"> Home </a>
                </li>
                
                <li class="nav-item ">
                    <a class="nav-link navbarText" href="http://bratgo.com/2.%20About%20the%20city/"> About the city <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link navbarText" href="http://bratgo.com/3.%20Life%20in%20Bratislava/"> Life in Bratislava </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link navbarText" href="http://bratgo.com/4.%20Study/"> Study </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link navbarText" href="http://bratgo.com/5.%20Work/"> Work </a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link navbarText" href="http://bratgo.com/6.%20Free%20time/"> What to do in a free time </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link navbarText" href="http://bratgo.com/7.%20Need%20help/"> Need help? </a>
                </li>

            </ul>
        </div>
    </nav>
        
                
      
        
        <div id="about">
            
            <div id="about1" class="container">
                
                 
      <div class="container">
      
            <h1>Get in touch!</h1>

              <div id="error"><? echo $error.$successMessage; ?></div>

              <form method="post">
          <fieldset class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            <small class="text-muted">We'll never share your email with anyone else.</small>
          </fieldset>
          <fieldset class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" >
          </fieldset>
          <fieldset class="form-group">
            <label for="exampleTextarea">What would you like to ask us?</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
          </fieldset>
          <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>

                </div>
                
            </div>
        
    </div>
        
       
        
                  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
      
         
        
    </script>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
      
            
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
      
    <script type="text/javascript">
        
           $(window).scroll(function () {
   
                if ($(document).scrollTop() > 500) {
        
                $('nav').addClass('boja');
        
                } else {
        
                $('nav').removeClass('boja');
        
                }
    
            });
         
        
          
          $('[data-toggle="popover"]').popover()
          $('[data-toggle="tooltip"]').tooltip()
         
     </script>  
  </body>
</html>