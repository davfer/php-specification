<?php

namespace PhpSpecification\Specification;

interface Specification
{
    public function isSatisfiedBy(object $object): bool;
}