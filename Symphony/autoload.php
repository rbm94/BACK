<?php
class Autoload
{
    public static function chargement($class)
    {
        require('controller/' . $class . '.php');
        //require('Controller/User.php');
    }
}
spl_autoload_register(array('Autoload', 'chargement'));
// s'éxecute a chaque fois que le mot 'New4 apparaît
// Il va apporter en argument de notre fonction ce qui suit après le new 

/*
$a = new Autoload 
$a -> chargement();

Autoload::chargement('User');
*/
new User;
require('user.php');


?>