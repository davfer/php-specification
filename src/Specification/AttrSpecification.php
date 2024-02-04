<?php

namespace PhpSpecification\Specification;

/**
 * Attribute specification.
 *
 * Suits for simple attribute comparison. Better used encapsulated in your domain language. Uses === comparison.
 *
 * @example new AttrSpecification('id', 1)
 */
class AttrSpecification implements Specification
{
    public function __construct(
        private readonly string $attr,
        private readonly mixed $val,
        private readonly AttrComparison $comparison = AttrComparison::EQUAL,
    ) {
    }

    public function isSatisfiedBy(object $object): bool
    {;
        $attr = $this->attr;

        return $this->compare($object->$attr, $this->val);
    }

    private function compare(mixed $a, mixed $b): bool
    {
        return match ($this->comparison) {
            AttrComparison::EQUAL => $a === $b,
            AttrComparison::NOT_EQUAL => $a !== $b,
            AttrComparison::GREATER_THAN => $a > $b,
            AttrComparison::GREATER_THAN_OR_EQUAL => $a >= $b,
            AttrComparison::LESS_THAN => $a < $b,
            AttrComparison::LESS_THAN_OR_EQUAL => $a <= $b,
            AttrComparison::IN => in_array($a, $b, true),
            AttrComparison::NOT_IN => !in_array($a, $b, true),
        };
    }
}