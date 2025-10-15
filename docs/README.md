# User-authentication
Autores: 
Cristhian Heber Pires da Silva – RA: 2019595
Alexandre Jose Gomes - RA: 1986088

---

## Descrição
Projeto de gerenciamento de usuários em PHP, onde é possível **cadastrar usuários, realizar login e redefinir senhas**. As senhas são validadas e criptografadas usando `password_hash`.

---

## Estrutura de Pastas
User-Authentication/
├─ src/
│ ├─ User.php # Classe do usuário
│ ├─ Validator.php # Classe de validação de e-mail e senha
│ └─ index.php # Exemplo de uso
├─ docs/
  └─ README.md

---

## Instruções de Execução (XAMPP / Servidor Local)
1. Copie a pasta `User-Authentication` para o diretório `htdocs` do XAMPP (ou equivalente).
2. Inicie o Apache no painel de controle do XAMPP.
3. Abra o navegador e acesse:
http://localhost/ProjetoFinalP1

---

## Funcionalidades Implementadas

- **Cadastrar usuário** (`registerUser`)  
  - Valida e-mail e senha  
  - Evita cadastro com e-mail inválido ou senha fraca  

- **Login de usuário** (`login`)  
  - Verifica se as credenciais são válidas  
  - Mensagem de sucesso ou erro de login  

- **Redefinir senha** (`resetPassword`)  
  - Valida nova senha  
  - Atualiza senha do usuário

- **Listar usuários** (`getUsuarios`)  
  - Retorna lista de usuários cadastrados (apenas para testes)

---

## Regras de Negócio

- Senha deve conter **mínimo 8 caracteres, ao menos 1 letra maiúscula e 1 número**.
- E-mail deve ser **válido**.
- Usuários são mantidos **em memória**, não há persistência em banco de dados.

---

## Limitações

- Não há interface gráfica; execução via terminal ou navegador com `echo`.
- Usuários e senhas só existem enquanto o script está rodando.

---

## Exemplos de Uso

```php
require 'User.php';

$user = new User();

// Cadastro de usuários
echo $user->registerUser("Maria Oliveira", "maria@email.com", "Senha123") . "<br>";
echo $user->registerUser("Pedro", "pedro@@email", "Senha123") . "<br>";

// Login
echo $user->login("maria@email.com", "Senha123") . "<br>";
echo $user->login("maria@emal.com", "Errada123") . "<br>";

// Redefinir senha
echo $user->resetPassword(1, "NovaSenha1") . "<br>";
echo $user->login("maria@email.com", "NovaSenha1") . "<br>";
