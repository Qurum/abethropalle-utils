<?php

namespace Abethropalle\Utils\Graph;

class Edge
{
    public function __construct(
        protected Node $source,
        protected Node $target)
    {
    }

    public function getSource()
    {
        return $this->source;
    }

    public function getTarget()
    {
        return $this->target;
    }
}