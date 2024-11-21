<?php

declare(strict_types=1);

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\State\AuthorProcessor;
use App\State\AuthorProvider;

#[ApiResource(
    operations: [
        new Get(),
        new Post(),
        new Patch(
            input: AuthorBookDTO::class,
        ),
    ],
    provider: AuthorProvider::class,
    processor: AuthorProcessor::class,
)]
class Author
{
    public function __construct(
        public string $id,
        public string $name,
        /** @var Book[] */
        public array  $books = [],
    )
    {
    }
}
