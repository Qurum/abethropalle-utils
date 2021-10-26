<?php
/*
 * Copyright (c) Ronia Rebane 2021.
 * Permission to use, copy, modify, and/or distribute this software for any purpose with or without fee is hereby granted.
 */

namespace Abethropalle\Utils\Graph;

/**
 * Строитель пути из вершин.
 *
 * Реализует fluent interface. После завершения не может быть изменён.
 */
class PathBuilder
{
    protected $path = [];
    protected $locked = false;

    /**
     * Добавляет вершину в путь.
     *
     * @param Node $n
     * @return $this
     */
    public function push(Node $n)
    {
        if ($this->locked) return $this;
        array_push($this->path, $n);
        return $this;
    }

    /**
     * Удаляет последнюю из добавленных вершин.
     *
     * @return $this
     */
    public function pop()
    {
        if ($this->locked) return $this;
        if (!empty($this->path)) {
            array_pop($this->path);
        }
        return $this;
    }

    /**
     * Возвращает путь в виде массива вершин, от начальной до конечной.
     * @return array
     */
    public function path()
    {
        return $this->path;
    }

    /**
     * @return $this
     */
    public function lock()
    {
        $this->locked = true;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $result = [];
        array_walk($this->path, function ($node) use (&$result) {
            $result[] = $node->getValue();
        });
        return implode(' -> ', $result);
    }
}