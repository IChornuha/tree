<?php
declare(strict_types=1);
namespace application;

class ListItem
{
    private $value;
    private $link;

    public function __construct($value, int $link)
    {
        $this->value = $value;
        $this->link = $link;
    }

    public function next()
    {
        return $this->link;
    }
    public function getValue(){
        return $this->value;
    }
}
