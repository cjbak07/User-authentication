<?php
    class validate{
        public static function emailValidate(string $email): bool{
            
            return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
        }

        public static function passwordValidate(string $password): bool{

            return preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
        }
    }
?>