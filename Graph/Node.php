<?php

namespace Abethropalle\Utils\Graph;

class Node
{
    protected $mark = '';
    protected $children = [];

    public function __construct(protected mixed $value)
    {
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setMark(string $mark)
    {
        $this->mark = $mark;
    }

    public function getMark()
    {
        return $this->mark;
    }

    public function addChild(Node $node)
    {
        if (!in_array($node, $this->children)) {
            $this->children[] = $node;
        }
    }

    public function children()
    {
        for ($i = 0; $i < count($this->children); $i++) {
            yield $this->children[$i];
        }
    }
}