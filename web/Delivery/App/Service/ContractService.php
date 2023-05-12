require_once ($ _ SERVER [ 'DOCUMENT_ROOT']. '/ Delivery / App / Domain / Contract.php');
require_once ($ _SERVER [ 'DOCUMENT_ROOT']. '/ Delivery / App / Repository / 
ContractRepositoryInterface.php');
class ContractService
{
private $ repository;
public function __construct (ContractRepositoryInterface $ repository)
{
$ This-> repository = $ repository;
}
public function getAllContracts ()
{
return $ this-> repository-> getContractList ();
}
public function getContractByNumber ($ number)
{
if (isset ($ number))
{
return $ this-> repository-> getContractByNumber ($ number);
}
else
{
throw new Exception ( 'Contract number is undefined!');
}
}
public function createContract ($ number, $ supplier, $ title, $ note)
{
if (isset ($ number, $ supplier, $ title, $ note))
{
$ Agreed = date ( 'Ym-d');
$ Contract = new Contract ($ number, $ agreed, $ supplier, $ title, $ note);
$ This-> repository-> create ($ contract);
}
else
{
throw new Exception ( 'Please fill in all contract fields!');
}
}
public function updateContract ($ number, $ supplier, $ title, $ note)
{
if (isset ($ number, $ supplier, $ title, $ note))
{
$ Contract = $ this-> repository-> getContractByNumber ($ number);
$ Updated = new Contract ($ number, $ contract-> getAgreed (), $ supplier, $ title, $ note);
$ This-> repository-> update ($ updated);
}
else
{
throw new Exception ( 'Please fill in all contract fields!');
}
}
public function deleteContract ($ number)
{
if (isset ($ number))
{
$ This-> repository-> delete ($ number);
}
else
{
throw new Exception ( 'Contract number is undefined!');
}
}
}