<?php
declare(strict_types=1);
namespace application;

use application\ListItem;

class LinkedList
{
    private $repo = [];
    private $link = 0;
    private $first = 0;

/**
 * Adding to list
 *
 * @param ListItem $value
 * @return void
 */
    public function add(ListItem $value)
    {
        $this->repo[$this->link] = $value;
        $this->link = $value->next();
    }
    
    public function getFirst()
    {
        return $this->repo[0];
    }

    public function get(int $index)
    {
        return $this->repo[$index];
    }

    public function getAll()
    {
        return $this->repo;
    }
}
