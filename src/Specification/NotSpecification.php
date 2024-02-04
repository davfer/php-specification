<?php

namespace PhpSpecification\Specification;

/**
 * Not specification.
 *
 * Negates the provided Specification.
 */
class NotSpecification implements Specification
{
    public function __construct(private readonly Specification $specification)
    {
    }

    public function isSatisfiedBy(object $object): bool
    {
        return !$this->specification->isSatisfiedBy($object);
    }
}