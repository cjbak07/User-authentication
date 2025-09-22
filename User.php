<?php

require_once 'Validator.php';

class User{
    
    private array $users = [];

    public function __construct(){
        
        $this->users = [
            ['id' => 1, 
            'name' => 'Maria Oliveira', 
            'email' => 'maria@email.com', 
            'password' => password_hash('Senha123', PASSWORD_DEFAULT)],

            ['id' => 2, 
            'name' => 'Pedro', 
            'email' => 'pedro@@email', 
            'password' => password_hash('Senha123', PASSWORD_DEFAULT)]
        ];
    }

    public function registerUser(string $name, string $email, string $password): string{

        if (!validate::emailValidate($email)) return "E-mail inválido";
        if (!validate::passwordValidate($password)) return "Senha fraca";

        
        $id = count($this->users) + 1;
        $this->users[] = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        return "Usuário {$name} cadastrado com sucesso";
    }

    public function login(string $email, string $password): string{
        foreach ($this->users as $user) {
            if ($user['email'] === $email){
                if (password_verify($password, $user['password'])){
                    return "Login bem-sucedido. Bem-vindo(a) {$user['name']}!";
                }
                return "Credenciais inválidas";
            }
        }
        return "Credenciais inválidas";
    }

    public function resetPassword(int $id, string $newPassword): string{
        
        if (!validate::passwordValidate($newPassword)) return "Senha fraca";

        foreach ($this->users as &$user){
            if ($user['id'] === $id){
                $user['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
                return "Senha alterada com sucesso";
            }
        }
        return "Usuario não encontrado";
    }
    public function getUsuarios(): array{
        return $this->users;
    }
}

?>