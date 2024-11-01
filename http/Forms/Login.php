<?php

namespace http\Forms;

use Core\Validator;

class Login
{
    protected $errors = [];

    public function validate(string $email, string $password): bool
    {

        $validator = new Validator;

        if (! $validator->email($email)) {
            $this->errors['email'] = 'Invalid email format';
        }

        if (! $validator->string($password)) {
            $this->errors['password'] = 'Invalid Password';
        }

        return empty($this->errors);

    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function addError(string $key, string $errorValue)
    {
        $this->errors[$key] = $errorValue;
    }
}
