<?php

declare(strict_types=1);

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\Author;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * @implements ProviderInterface<Author>
 */
class AuthorProvider implements ProviderInterface
{
    #[\Override]
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): Author
    {
        $id = $uriVariables['id'] ?? null;

        if ($id === '1') {
            return new Author(
                '1',
                'Isaac Asimov',
                []
            );
        }

        if ($id === '2') {
            return new Author(
                '2',
                'Jules Verne',
                []
            );
        }

        throw new NotFoundHttpException();
    }
}
