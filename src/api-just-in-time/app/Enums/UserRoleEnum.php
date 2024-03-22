<?php

namespace App\Enums;

enum UserRoleEnum: int {
    case ADMIN = 1;
    case ATTENDANT = 2;
    case CLIENT = 3;

    public function getName(): string
    {
        return match ($this)
        {
            self::ADMIN => 'Admin',
            self::ATTENDANT => 'Atendente',
            self::CLIENT => 'Cliente',
            default => 'Tipo de usuário não encontrado'
        };
    }
}
