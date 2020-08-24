<?php

declare(strict_types=1);

namespace Rector\Core\Guard;

use PhpParser\Node;
use Rector\Core\Exception\NoRectorsLoadedException;
use Rector\Core\Exception\Rector\InvalidRectorException;
use Rector\Core\PhpParser\NodeTraverser\RectorNodeTraverser;
use Rector\FileSystemRector\FileSystemFileProcessor;

final class RectorGuard
{
    /**
     * @var RectorNodeTraverser
     */
    private $rectorNodeTraverser;

    /**
     * @var FileSystemFileProcessor
     */
    private $fileSystemFileProcessor;

    public function __construct(
        FileSystemFileProcessor $fileSystemFileProcessor,
        RectorNodeTraverser $rectorNodeTraverser
    ) {
        $this->rectorNodeTraverser = $rectorNodeTraverser;
        $this->fileSystemFileProcessor = $fileSystemFileProcessor;
    }

    public function ensureSomeRectorsAreRegistered(): void
    {
        if ($this->rectorNodeTraverser->getPhpRectorCount() > 0) {
            return;
        }

        if ($this->fileSystemFileProcessor->getFileSystemRectorsCount() > 0) {
            return;
        }

        // @todo @dx display nicer way instead of all red, as in https://github.com/symplify/symplify/blame/master/packages/easy-coding-standard/bin/ecs#L69-L83
        throw new NoRectorsLoadedException(sprintf(
            'We need some rectors to run:%s* register them in rector.php under "services():"%s* use "--set <set>"%s* or use "--config <file>.yaml"',
            PHP_EOL,
            PHP_EOL,
            PHP_EOL
        ));
    }

    public function ensureGetNodeTypesAreNodes(): void
    {
        foreach ($this->rectorNodeTraverser->getAllPhpRectors() as $phpRector) {
            foreach ($phpRector->getNodeTypes() as $nodeTypeClass) {
                if (is_a($nodeTypeClass, Node::class, true)) {
                    continue;
                }

                throw new InvalidRectorException(sprintf(
                    'Method "%s::getNodeTypes()" provides invalid node class "%s". It must be child of "%s"',
                    get_class($phpRector),
                    $nodeTypeClass,
                    Node::class
                ));
            }
        }
    }
}
