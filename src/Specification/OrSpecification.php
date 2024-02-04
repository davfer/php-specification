<?php

namespace PhpSpecification\Specification;

/**
 * Or specification.
 *
 * Operates the set of specifications with OR operator. Shortcut logic is used (first positive).
 */
class OrSpecification implements Specification
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
            if ($specification->isSatisfiedBy($object)) {
                return true;
            }
        }

        return false;
    }
}