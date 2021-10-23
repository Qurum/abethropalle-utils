<?php

namespace Abethropalle\Utils\Graph;

class DepthFirstSearchCycleDetector
{
    protected $result = false;
    protected PathBuilder $path;
    protected $is_complete = false;

    public function getCycle(){
        if(! $this->is_complete){
            $this->detect();
        }
        return $this->path;
    }

    public function __construct(protected Graph $graph){
        $this->path = new PathBuilder();
    }

    protected function dfs($node)
    {
        if($this->result)return;

        $node->setMark('grey');
        $this->path->push($node);

        foreach($node->children() as $child){
            if($child->getMark() == 'white'){
                $this->dfs($child);
            }

            if($child->getMark() == 'grey'){
                $this->path->push($child)->lock();
                $this->result = true;
                return;
            }
        }
        $node->setMark('black');
        $this->path->pop();
    }

    public function detect(){
        if($this->is_complete) return $this->result;

        foreach($this->graph->nodes() as $node){
            $node->setMark('white');
        }

        foreach($this->graph->nodes() as $node){
            if($node->getMark() == 'white'){
                $this->dfs($node);
            };
        }

        $this->graph->clean();
        $this->is_complete = true;
        return $this->result;
    }
}