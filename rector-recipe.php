<?php

declare(strict_types=1);

use PhpParser\Node\Stmt\ClassMethod;
use Rector\RectorGenerator\Provider\RectorRecipeProvider;
use Rector\RectorGenerator\ValueObject\RectorRecipe;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Rector\SymfonyPhpConfig\inline_object;

// run "bin/rector generate" to a new Rector basic schema + tests from this config
return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $rectorRecipe = new RectorRecipe(
        // category
        'PhalconToSymfony',
        // name
        'PhalconPropertyToSymfonyPropertyRector',
        // node types - this will get in "getNodeTypes()" method
        [ClassMethod::class],
        // description
        'Convert Phalcon property to Symfony property including ORM annotaions',

        // code before
        <<<'CODE_SAMPLE'
<?php

class SomeClass
{
    /** @var integer */
    public $resources_id;
}
CODE_SAMPLE,
        // code after
        <<<'CODE_SAMPLE'
<?php

class SomeClass
{
    /**
     * @ORM\Column(type="integer", length=255)
     */
    private string $resources_id;
}
CODE_SAMPLE,
        // informational resources on "why" the change, e.g. RFC, upgrade guide on Github
        [
            'https://...'
        ],

        // OPTIONAL ↓

        // e.g. symfony30, target set to add this Rule to; keep null if part of core
        // set, use `SetList::SOME_CONSTANT` for this
        null,

        // configuration in array
        [],

        // extra file name
        null,
        // extra file content
        null
    );

    $services->set(RectorRecipeProvider::class)
        ->arg('$rectorRecipe', inline_object($rectorRecipe));
};
