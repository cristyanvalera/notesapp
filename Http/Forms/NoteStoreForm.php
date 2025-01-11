<?php

declare(strict_types=1);

namespace Http\Forms;

use Core\Validator;

class NoteStoreForm
{
    protected array $errors = [];

    public function validate(string $body): bool
    {
        if (! Validator::text($body, 3, 1000)) {
            $this->errors['body'] = 'A body of no more than 1.000 characters and minimum 3 characters is required';
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
