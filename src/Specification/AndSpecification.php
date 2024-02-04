<?php

namespace PhpSpecification\Specification;

/**
 * And specification.
 *
 * Operates the set of specifications with AND operator. Shortcut logic is used (first negative).
 */
class AndSpecification implements Specification
{
    /**
     * @var Specification[]
     */
    private array $specifications;

    public function __construct(Specification ...$specifications)
    {
        $this->specifications = $specifications;
    }

    public function isSatisfiedBy(object $object): bool
    {
        foreach ($this->specifications as $specification) {
            if (!$specification->isSatisfiedBy($object)) {
                return false;
            }
        }

        return true;
    }
}