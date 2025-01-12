<?php

declare(strict_types=1);

namespace Http\Forms;

use Core\{ValidationException, Validator};

class LoginForm
{
    protected array $errors = [];

    public function __construct(public array $attributes)
    {
        if (! Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (! Validator::password($attributes['password'])) {
            $this->errors['password'] = 'Please provide a valid password.';
        }
    }

    /** @throws ValidationException */
    public static function validate(array $attributes): self
    {
        $instance = new self($attributes);

        if ($instance->failed()) {
            $instance->throw();
        }

        return $instance;
    }

    public function throw(): never
    {
        ValidationException::throw($this->errors, $this->attributes);
    }

    public function failed(): bool
    {
        return ! empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function addError(string $key, string $message): self
    {
        $this->errors[$key] = $message;

        return $this;
    }
}
