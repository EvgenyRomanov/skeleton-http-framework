<?php

declare(strict_types=1);

namespace Tests\Integration\EloquentModels;

use App\Infrastructure\Models\User;
use Tests\BaseTestAbstract;

/**
 * @internal
 */
final class UserTest extends BaseTestAbstract
{
    public function testCreateUser(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        self::assertArrayHasKey('email', $user->toArray());
    }
}
