<? Php
session_start ();
require_once ($ _ SERVER [ 'DOCUMENT_ROOT']. '/ Delivery / App / Controller.php');
if (isset ($ _ SESSION [ 'username']))
{
$ Controller-> redirect ($ _ SESSION [ 'username']);
}
else
{
$ Controller-> redirect ( 'login');
}
?>