<?php

namespace PhpSpecification\Specification;

enum AttrComparison
{
    case EQUAL;
    case NOT_EQUAL;
    case GREATER_THAN;
    case GREATER_THAN_OR_EQUAL;
    case LESS_THAN;
    case LESS_THAN_OR_EQUAL;
    case IN;
    case NOT_IN;
}
