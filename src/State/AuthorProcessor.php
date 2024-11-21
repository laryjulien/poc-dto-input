<?php

declare(strict_types=1);

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\ApiResource\Author;
use App\ApiResource\AuthorBookDTO;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @implements ProcessorInterface<AuthorBookDTO, Author>
 */
class AuthorProcessor implements ProcessorInterface
{
    #[\Override]
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): Author
    {
        $authorId = $uriVariables['id'] ?? null;

        if (null === $authorId) {
            throw new BadRequestHttpException('AuthorId expected');
        }

        if (!$context['previous_data'] instanceof Author) {
            throw new NotFoundHttpException('Author not found');
        }

        $author = $context['previous_data'];

        if (\count($data->books) > 0) {
            $author->books = $data->books;
        }

        return $author;
    }
}
