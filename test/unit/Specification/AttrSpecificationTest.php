<?php

namespace unit\Specification;

use PhpSpecification\Specification\AttrComparison;
use PhpSpecification\Specification\AttrSpecification;
use PhpSpecification\Test\Resources\Entities\User;
use PHPUnit\Framework\TestCase;

class AttrSpecificationTest extends TestCase
{
    /**
     * @dataProvider comparisonExpectations
     */
    public function testIsSatisfiesByProperly(
        AttrComparison $comparison,
        string $attr,
        mixed $val,
        bool $expected1,
        bool $expected2,
    ): void {
        $probe1 = new User(1, 'john', 'john@example.com');
        $probe2 = new User(2, 'jane', 'jane@example.com');

        $sut = new AttrSpecification($attr, $val, $comparison);

        self::assertEquals($expected1, $sut->isSatisfiedBy($probe1), 'failed probe1 expectation');
        self::assertEquals($expected2, $sut->isSatisfiedBy($probe2), 'failed probe2 expectation');
    }

    public static function comparisonExpectations(): array
    {
        return [
            [AttrComparison::EQUAL, 'name', 'john', true, false],
            [AttrComparison::NOT_EQUAL, 'name', 'john', false, true],
            [AttrComparison::GREATER_THAN, 'id', 1, false, true],
            [AttrComparison::GREATER_THAN_OR_EQUAL, 'id', 1, true, true],
            [AttrComparison::LESS_THAN, 'id', 2, true, false],
            [AttrComparison::LESS_THAN_OR_EQUAL, 'id', 2, true, true],
            [AttrComparison::IN, 'name', ['john', 'tom'], true, false],
            [AttrComparison::NOT_IN, 'name', ['john', 'tom'], false, true],
        ];
    }
}