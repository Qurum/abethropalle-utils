<?php
/*
 * Copyright (c) Ronia Rebane 2021.
 * Permission to use, copy, modify, and/or distribute this software for any purpose with or without fee is hereby granted.
 */

namespace Abethropalle\Utils\Graph;

/**
 * Строитель графа из текстовых строк.
 *
 * Вершины с одинаковыми строками неразличимы.
 * Между двумя вершинами может быть не больше одной стрелки.
 */
class GraphBuilder
{
    protected $values = [];
    protected $arrows = [];

    /**
     * Добавляет вершину.
     *
     * @param string $s
     * @return Node
     */
    public function node(string $s): Node
    {
        if (!isset($this->values[$s])) {
            $this->values[$s] = new Node($s);
        }
        return $this->values[$s];
    }

    /**
     * Добавляет стрелку. Создаёт вершины, если отсутствуют.
     *
     * @param string $s
     * @param string $t
     * @return Edge
     */
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

    /**
     * Удаляет всё добавленное.
     */
    public function reset()
    {
        $this->values = [];
        $this->arrows = [];
    }

    /**
     * Строит граф.
     *
     * @return Graph
     */
    public function build(): Graph
    {
        $g = new Graph();
        array_walk($this->values, fn($node) => $g->addNode($node));
        array_walk($this->arrows, fn($edge) => $g->addEdge($edge));
        return $g;
    }
}