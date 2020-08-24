<?php
// rector.php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\RectorGenerator\ValueObject\RectorRecipe;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Rector\Php74\Rector\Property\TypedPropertyRector;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(__DIR__ . '/rector-recipe.php', null, 'not_found');
};