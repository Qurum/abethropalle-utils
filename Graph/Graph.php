<?php
/*
 * Copyright (c) Ronia Rebane 2021.
 * Permission to use, copy, modify, and/or distribute this software for any purpose with or without fee is hereby granted.
 */

namespace Abethropalle\Utils\Graph;

/**
 * Ориентированный размеченный граф.
 */
class Graph
{
    protected $edges = [];
    protected $nodes = [];

    /**
     * @param Edge $e
     */
    public function addEdge(Edge $e)
    {
        $source = $e->getSource();
        $target = $e->getTarget();
        if (!in_array($source, $this->nodes)) {
            $this->nodes[] = $source;
        }
        if (!in_array($target, $this->nodes)) {
            $this->nodes[] = $target;
        }
        $this->edges[] = $e;
        $source->addChild($target);
    }

    /**
     * @param Node $n
     */
    public function addNode(Node $n)
    {
        $this->nodes[] = $n;
    }

    /**
     * @return \Generator
     */
    public function edges()
    {
        for ($i = 0; $i < count($this->edges); $i++) {
            yield $this->edges[$i];
        }
    }

    /**
     * @return \Generator
     */
    public function nodes()
    {
        for ($i = 0; $i < count($this->nodes); $i++) {
            yield $this->nodes[$i];
        }
    }

    /**
     * Снять все метки с вершин.
     */
    public function clean()
    {
        foreach ($this->nodes() as $node) {
            $node->setMark('');
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $result = '';
        foreach ($this->edges() as $edge) {
            $result .= $edge->getSource()->getValue() . ' --> ' . $edge->getTarget()->getValue() . PHP_EOL;
        }
        return $result;
    }
}