<?php

declare(strict_types=1);

namespace Rector\SOLID\Tests\Rector\Foreach_\ChangeNestedForeachIfsToEarlyContinueRector;

use Iterator;
use Rector\Core\Testing\PHPUnit\AbstractRectorTestCase;
use Rector\SOLID\Rector\Foreach_\ChangeNestedForeachIfsToEarlyContinueRector;
use Symplify\SmartFileSystem\SmartFileInfo;

final class ChangeNestedForeachIfsToEarlyContinueRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(SmartFileInfo $fileInfo): void
    {
        $this->doTestFileInfo($fileInfo);
    }

    public function provideData(): Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    protected function getRectorClass(): string
    {
        return ChangeNestedForeachIfsToEarlyContinueRector::class;
    }
}
