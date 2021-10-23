<?php

namespace Abethropalle\Utils\Graph;

class PathBuilder
{
    protected $path = [];
    protected $locked = false;

    public function push(Node $n)
    {
        if ($this->locked) return $this;
        array_push($this->path, $n);
        return $this;
    }

    public function pop()
    {
        if ($this->locked) return $this;
        if (!empty($this->path)) {
            array_pop($this->path);
        }
        return $this;
    }

    public function path()
    {
        return $this->path;
    }

    public function lock()
    {
        $this->locked = true;
        return $this;
    }

    public function __toString()
    {
        $result = [];
        array_walk($this->path, function ($node) use (&$result) {
            $result[] = $node->getValue();
        });
        return implode(' -> ', $result);
    }
}