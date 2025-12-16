<?php

declare(strict_types=1);

namespace App\Infrastructure\Model;

use App\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $email
 * @psalm-suppress MissingTemplateParam
 */
final class User extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /** @psalm-suppress MissingReturnType */
    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
