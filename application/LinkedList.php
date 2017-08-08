<?php
declare(strict_types=1);
namespace application;

use application\ListItem;

class LinkedList
{
    private $repo = [];
    private $link = 0;
    private $last = 0;

/**
 * Adding to list
 *
 * @param ListItem $value
 * @return void
 */
    public function add(ListItem $value)
    {
        $this->last = $this->link;
        $this->repo[$this->link] = $value;
        $this->link = $value->next();
    }
    
    public function getLast()
    {
        $l = $this->repo[$this->last];
        return $l;
    }

    public function getAll()
    {
        return $this->repo;
    }
}
