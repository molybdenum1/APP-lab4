<? Php
session_start ();
require_once ($ _ SERVER [ 'DOCUMENT_ROOT']. '/ Delivery / App / Controller.php');
session_unset ();
session_destroy ();
$ Controller-> redirect ( 'login');
?>