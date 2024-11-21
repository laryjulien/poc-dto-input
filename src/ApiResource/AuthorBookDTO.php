<?php

declare(strict_types=1);

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\NotExposed;

#[ApiResource(
    operations: [
        new NotExposed(),
    ]
)]
class AuthorBookDTO
{
    public function __construct(
        /** @var Book[] $books */
        public array $books,
    )
    {
    }
}
