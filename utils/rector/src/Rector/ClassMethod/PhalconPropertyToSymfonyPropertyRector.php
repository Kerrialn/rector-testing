<?php

declare(strict_types=1);

namespace Utils\Rector\Rector\ClassMethod;

use PhpParser\Node;
use Rector\Core\Rector\AbstractRector;
use Rector\Core\RectorDefinition\CodeSample;
use Rector\Core\RectorDefinition\RectorDefinition;

/**
 * @see https://...
 *
 * @see \Utils\Rector\Tests\Rector\ClassMethod\PhalconPropertyToSymfonyPropertyRector\PhalconPropertyToSymfonyPropertyRectorTest
 */
final class PhalconPropertyToSymfonyPropertyRector extends AbstractRector
{
    public function getDefinition(): RectorDefinition
    {
        return new RectorDefinition('Convert Phalcon property to Symfony property including ORM annotaions', [
            new CodeSample(
                <<<'PHP'
class SomeClass
{
    /** @var integer */
    public $resources_id;
}
PHP

                ,
                <<<'PHP'
class SomeClass
{
    /**
     * @ORM\Column(type="integer", length=255)
     */
    private string $resources_id;
}
PHP

            )
        ]);
    }

    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [\PhpParser\Node\Stmt\ClassMethod::class];
    }

    /**
     * @param \PhpParser\Node\Stmt\ClassMethod $node
     */
    public function refactor(Node $node): ?Node
    {
        // change the node

        return $node;
    }
}
