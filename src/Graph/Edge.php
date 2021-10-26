<?php
/*
 * Copyright (c) Ronia Rebane 2021.
 * Permission to use, copy, modify, and/or distribute this software for any purpose with or without fee is hereby granted.
 */

namespace Abethropalle\Utils\Graph;

/**
 * Ребро между двумя Node.
 */
class Edge
{
    /**
     * @param Node $source
     * @param Node $target
     */
    public function __construct(
        protected Node $source,
        protected Node $target)
    {
    }

    /**
     * @return Node
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return Node
     */
    public function getTarget()
    {
        return $this->target;
    }
}