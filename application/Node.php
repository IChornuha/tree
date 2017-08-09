<?php
declare(strict_types=1);

namespace application;

class Node
{
    public $value;
    public $child;
    public $nodes;

    public function __construct($item, $child = null)
    {
        $this->value = $item;
        $this->child = $child;
        $this->nodes = null;
    }
}
