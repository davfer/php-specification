<?php

namespace unit\Specification;

use PhpSpecification\Specification\AndSpecification;
use PhpSpecification\Specification\NotSpecification;
use PhpSpecification\Test\Resources\Entities\User;
use PhpSpecification\Test\Resources\specs\UserByIdSpecification;
use PhpSpecification\Test\Resources\specs\UserByNameSpecification;
use PHPUnit\Framework\TestCase;

class NotSpecificationTest extends TestCase
{
    public function testIsSatisfiesByProperly(): void
    {
        $example1 = new UserByIdSpecification(1);

        $probe1 = new User(1, 'john', 'john@example.com');
        $probe2 = new User(2, 'jane', 'jane@example.com');

        $sut = new NotSpecification($example1);
        self::assertFalse($sut->isSatisfiedBy($probe1));
        self::assertTrue($sut->isSatisfiedBy($probe2));
    }
}