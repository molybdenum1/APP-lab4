<? Php
session_start ();
require_once ($ _ SERVER [ 'DOCUMENT_ROOT']. '/ Delivery / App / Controller.php');
require_once ($ _ SERVER [ 'DOCUMENT_ROOT']. '/ Delivery / App / Domain / Contract.php');
require_once ($ _ SERVER [ 'DOCUMENT_ROOT']. '/ Delivery / App / Repository / 
MySQLContractRepository.php');
require_once ($ _ SERVER [ 'DOCUMENT_ROOT']. '/ Delivery / App / Service / 
ContractService.php');
if (! isset ($ _ SESSION [ 'username']))
{
$ Controller-> redirect ( 'login');
}
$ Repository = new MySQLContractRepository ();
$ Service = new ContractService ($ repository);
?>
<!DOCTYPE html>
<html>
<head>
<title> Contracts </ title>
<link rel = "stylesheet" href = 
"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity = 
"sha384-MCw98 / SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin = 
"anonymous">
</head>
<body>
<nav class = "navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="./"> Delivery </a>
<div class = "collapse navbar-collapse" id = "navbarSupportedContent">
<ul class = "navbar-nav mr-auto">
<li class = "nav-item active">
<a class="nav-link" href="./contracts.php"> Contracts </a>
</li>
</ul>
<form class = "form-inline my-2 my-lg-0" action = "logout.php" method = "post">
<button class = "btn btn-outline-primary my-2 my-sm-0" type = "submit"> Logout </button>
</form>
</div>
</nav>
<div class = "row my-3 mx-1">
<div class = "col-4">
<Ul class = "list-group">
<Li class = "list-group-item active"> Contracts </ li>
<? Php foreach ($ service-> getAllContracts () as $ contract) {?>
<Li class = "list-group-item">
<a href="contracts.php?details=<?= $contract-> getNumber ()?> ">
# <? = $ Contract-> getNumber ()?>, <? = $ Contract-> getAgreed ()?>, <? = $ Contract-> 
getSupplier ()?>
</a>
</li>
<? Php}?>
</ul>
</div>
<div class = "col-8">
<? Php
if (isset ($ _ GET [ 'details']))
{
try
{
$ Contract = @ $ service-> getContractByNumber ($ _ GET [ 'details']);
?>
<form>
<div class = "form-group row">
<label for = "contractNumber" class = "col-sm-2 col-form-label"> Contract number </label><div class = "col-sm-10">
<input type = "text" readonly class = "form-control-plaintext" id = "contractNumber" value = 
"<? = $ Contract-> getNumber ()?>">
</div>
</div>
<div class = "form-group row">
<label for = "contractDate" class = "col-sm-2 col-form-label"> Contract date </label>
<div class = "col-sm-10">
<input type = "text" readonly class = "form-control-plaintext" id = "contractDate" value = 
"<? = $ Contract-> getAgreed ()?>">
</div>
</div>
<div class = "form-group row">
<label for = "supplier" class = "col-sm-2 col-form-label"> Supplier </label>
<div class = "col-sm-10">
<input type = "text" readonly class = "form-control-plaintext" id = "supplier" value = "<? = 
Htmlspecialchars ($ contract-> getSupplier ())?>">
</div>
</div>
<div class = "form-group row">
<label for = "title" class = "col-sm-2 col-form-label"> Title </label>
<div class = "col-sm-10">
<input type = "text" readonly class = "form-control-plaintext" id = "title" value = "<? = 
Htmlspecialchars ($ contract-> getTitle ())?>">
</div>
</div>
<div class = "form-group row">
<label for = "note" class = "col-sm-2 col-form-label"> Note </ label>
<div class = "col-sm-10">
<textarea class = "form-control" readonly rows = "5" id = "note"> <? = Htmlspecialchars ($ 
contract-> getNote ())?> </textarea>
</div>
</div>
</form>
<a class="btn btn-warning" href="#" role="button"> Edit </a>
<a class="btn btn-danger" href="#" role="button"> Remove </a>
<? Php
}
catch (Exception $ e)
{
?> <div class = "alert alert-danger" role = "alert"> <? = $ E-> getMessage ()?> </div> <? 
Php
}
}
else
{
?> <a class="btn btn-success" href="#" role="button"> New contract </a> <? Php
}
?>
</div>
</div>
</body>
</html