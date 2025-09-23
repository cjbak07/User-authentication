<?php

require_once 'User.php';

$user = new User();

echo $user->registerUser("Maria Oliveira", "maria@email.com", "Senha123") . "<br>" . "<br>";

echo $user->registerUser("Pedro", "pedro@@email", "Senha123") . "<br>" . "<br>";

echo $user->login("maria@email.com", "Senha123") . "<br>" . "<br>";
    
echo $user->login("maria@emal.com", "Errada123") . "<br>" . "<br>";

echo $user->resetPassword(1, "NovaSenha1") . "<br>";
echo $user->login("maria@email.com", "NovaSenha1") . "<br>";

?>