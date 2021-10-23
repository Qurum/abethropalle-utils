<?php

namespace Abethropalle\Utils\Graph;

class Graph
{
    protected $edges = [];
    protected $nodes = [];

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

    public function addNode(Node $n)
    {
        $this->nodes[] = $n;
    }

    public function edges()
    {
        for ($i = 0; $i < count($this->edges); $i++) {
            yield $this->edges[$i];
        }
    }

    public function nodes()
    {
        for ($i = 0; $i < count($this->nodes); $i++) {
            yield $this->nodes[$i];
        }
    }

    public function clean()
    {
        foreach ($this->nodes() as $node) {
            $node->setMark('');
        }
    }

    public function __toString()
    {
        $result = '';
        foreach ($this->edges() as $edge) {
            $result .= $edge->getSource()->getValue() . ' --> ' . $edge->getTarget()->getValue() . PHP_EOL;
        }
        return $result;
    }
}