<? Php
class Controller
{
private $ pages;
public function __construct ()
{
$ This-> pages = array (
'Login' => 'login.php',
'Supply_manager' => 'contracts.php'
);
}
public function redirect ($ path)
{
header ( "location: {$ this-> pages [$ path]}");
}
}
$ Controller = new Controller ();
?>