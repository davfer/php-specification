<?php

namespace PhpSpecification\Test\Unit\Specification;

use PhpSpecification\Specification\AndSpecification;
use PhpSpecification\Test\Resources\Entities\User;
use PhpSpecification\Test\Resources\specs\UserByIdSpecification;
use PhpSpecification\Test\Resources\specs\UserByNameSpecification;
use PHPUnit\Framework\TestCase;

class AndSpecificationTest extends TestCase
{
    public function testIsSatisfiesByProperly(): void
    {
        $example1 = new UserByIdSpecification(1);
        $example2 = new UserByNameSpecification('john');

        $probe1 = new User(1, 'john', 'john@example.com');
        $probe2 = new User(2, 'john', 'john@example.com');

        $sut = new AndSpecification($example1, $example2);

        self::assertTrue($sut->isSatisfiedBy($probe1));
        self::assertFalse($sut->isSatisfiedBy($probe2));
    }
}