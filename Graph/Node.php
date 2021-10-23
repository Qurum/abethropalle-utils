<?php
/*
 * Copyright (c) Ronia Rebane 2021.
 * Permission to use, copy, modify, and/or distribute this software for any purpose with or without fee is hereby granted.
 */

namespace Abethropalle\Utils\Graph;

/**
 * Размеченная подписанная вершина.
 *
 * Значением может быть объект любого типа.
 * Метка является строкой, по умолчанию пуста.
 * Может содержать сведения о вершинах-потомках.
 */
class Node
{
    protected $mark = '';
    protected $children = [];

    /**
     * @param mixed $value
     */
    public function __construct(protected mixed $value)
    {
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $mark
     */
    public function setMark(string $mark)
    {
        $this->mark = $mark;
    }

    /**
     * @return string
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * @param Node $node
     */
    public function addChild(Node $node)
    {
        if (!in_array($node, $this->children)) {
            $this->children[] = $node;
        }
    }

    /**
     * @return \Generator
     */
    public function children()
    {
        for ($i = 0; $i < count($this->children); $i++) {
            yield $this->children[$i];
        }
    }
}