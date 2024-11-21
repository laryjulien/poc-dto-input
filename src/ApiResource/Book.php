<?php

declare(strict_types=1);

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use App\State\BookProvider;

#[ApiResource(
    operations: [
        new Get(),
    ],
    provider: BookProvider::class
)]
class Book
{
    public function __construct(
        public string $id,
        public string $title,
        public Author $author,
    )
    {
    }
}
