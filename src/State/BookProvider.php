<?php

declare(strict_types=1);

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\Author;
use App\ApiResource\Book;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @implements ProviderInterface<Book>
 */
class BookProvider implements ProviderInterface
{
    #[\Override]
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): Book
    {
        $id = $uriVariables['id'] ?? null;

        if ($id === '1') {
            return new Book(
                '1',
                'Fondations',
                new Author('1', 'Isaac Asimov', []),
            );
        }

        if ($id === '2') {
            return new Book(
                '2',
                'Vingt mille lieues sous les mer',
                new Author('2', 'Jules Verne', []),
            );
        }

        throw new NotFoundHttpException();
    }
}
