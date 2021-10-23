<?php

namespace Abethropalle\Utils\Graph;

class GraphBuilder
{
    protected $values = [];
    protected $arrows = [];

    public function node(string $s): Node
    {
        if (!isset($this->values[$s])) {
            $this->values[$s] = new Node($s);
        }
        return $this->values[$s];
    }

    public function arrow(string $s, string $t): Edge
    {
        $source = $this->node($s);
        $target = $this->node($t);
        $arrow = $s . '->' . $t;
        if (!isset($this->arrows[$arrow])) {
            $this->arrows[$arrow] = new Edge($source, $target);
        }
        return $this->arrows[$arrow];
    }

    public function reset()
    {
        $this->values = [];
        $this->arrows = [];
    }

    public function build(): Graph
    {
        $g = new Graph();
        array_walk($this->values, fn($node) => $g->addNode($node));
        array_walk($this->arrows, fn($edge) => $g->addEdge($edge));
        return $g;
    }
}