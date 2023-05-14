<? Php
session_start ();
require_once ($ _ SERVER [ 'DOCUMENT_ROOT']. '/ Delivery / App / Controller.php');
require_once ($ _ SERVER [ 'DOCUMENT_ROOT']. '/ Delivery / App / Util / 
MySQLConnectionUtil.php');
if (isset ($ _ SESSION [ 'username']))
{
$ Controller-> redirect ($ _ SESSION [ 'username']);
}
if (isset ($ _ POST [ 'signin']))
{
$ _SESSION [ 'username'] = $ _POST [ 'username'];
$ _SESSION [ 'password'] = $ _POST [ 'password'];
try
{
@MySQLConnectionUtil :: getConnection ();
$ Controller-> redirect ($ _ SESSION [ 'username']);
}
catch (Exception $ e)
{
session_unset ();
session_destroy ();
?> <Div class = "alert alert-danger" role = "alert"> <? = $ E-> getMessage ()?> </ Div> <? 
Php
}
}
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Document</title>
 </head>
 <body>
    <div id="hello" style="background-color: coral;">
      <form class = "col-md-6 offset-md-3 p-3" method = "post">
         <div class = "form-group row">
            <label for = "inputEmail3" class = "col-sm-2 col-form-label"> User name </label>
            <div class = "col-sm-10">
               <input type = "text" class = "form-control" id = "inputUsername" name = "username" 
                  placeholder = "User name">
            </div>
         </div>
         <div class = "form-group row">
            <label for = "inputPassword3" class = "col-sm-2 col-form-label"> Password </label>
            <div class = "col-sm-10">
               <input type = "password" class = "form-control" id = "inputPassword" name = "password" 
                  placeholder = "Password">
            </div>
         </div>
         <div class = "form-group row">
            <div class = "col-sm-10">
               <input type = "submit" class = "btn btn-primary" value = "Sign in" name = "signin">
            </div>
         </div>
      </form>
   </div>
    <!-- <script src="./script.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </body>
 </html>
