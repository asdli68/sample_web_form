<?php
    if($_POST["submit"]){
        if(!$_POST["name"]){
            $error="<br />Please enter your name.";
        }
        if(!$_POST["email"]){
            $error.="<br />Please enter your email.";
        }
        if(!$_POST["comment"]){
            $error.="<br />Please enter a comment.";
        }
        if($_POST["email"]!="" AND !filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
            $error.="<br />Please enter a valid email address.";
        }
        if($error){
            $result='<div class="alert alert-danger"><strong>There were error(s) form:</strong>'.$error.'</div>';
        }else{
            if(mail("asdli68@gmail.com","Comment from website","
               Name:".$_POST['name']."
               Email:".$_POST['email']."
               Comment:".$_POST['comment'],"From:".$_POST['email'])){
                $result='<div class="alert alert-success"><strong>Thank you!</strong>I will be in touch</div>';
            }else{
                $result='<div class="alert alert-danger"><strong>Sorry, there was an error occur, please try again later</strong></div>';
            }
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        .emailForm{
            border: 1px solid grey;
            border-radius: 10px;
            margin-top: 20px;
        }
        form {
            padding-bottom: 20px;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
           <div class="col-md-6 col-md-offset-3 emailForm">
               <h1>My email form</h1>
               <?php echo $result; ?>
               <p class="lead">Please get in touch - I'll get back as soon as I can.</p>
               <form action="" method="post">
                   <div class="form-group">
                       <label for="name">Your Name:</label>
                       <input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $_POST['name'] ?>"/>
                   </div>
                   <div class="form-group">
                       <label for="email">Your Email:</label>
                       <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $_POST['email'] ?>"/>
                   </div>
                   <div class="form-group">
                       <label for="comment">Your Comment:</label>
                       <textarea name="comment" class="form-control"></textarea>
                   </div>
                   <input type="submit" class="btn btn-success btn-lg" value="Submit" name="submit">
               </form>
           </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>