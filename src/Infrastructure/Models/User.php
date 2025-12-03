<?php

declare(strict_types=1);

namespace App\Infrastructure\Models;

use App\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $email
 */
final class User extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
