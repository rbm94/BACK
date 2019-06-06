<?php 

// Sylvain : Inscription 
namespace Membre; 

use PDO; 
use Commentaire; 

class User
{
	private $pdo; 
	
	public function setPdo(){
		$pdo = new PDO();
	}
}

// Aziz : Commentaire
namespace Commentaire; 
class User
{
	
}


$user = new Membre\User; 
$user = new Commentaire\User; 


