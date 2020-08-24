<?php

namespace Utils\Rector\Tests\Rector\ClassMethod\PhalconPropertyToSymfonyPropertyRector\Fixture;

class SomeClass
{
    /** @var integer */
    public $resources_id;
}

?>
-----
<?php

namespace Utils\Rector\Tests\Rector\ClassMethod\PhalconPropertyToSymfonyPropertyRector\Fixture;

class SomeClass
{
    /**
     * @ORM\Column(type="integer", length=255)
     */
    private string $resources_id;
}

?>
