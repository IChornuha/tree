<?php
declare(strict_types=1);
namespace application;

class App
{
    private $unsortedTree;
    public function __construct($unsortedTree)
    {
        $this->unsortedTree = $unsortedTree;
    }

    public function run()
    {
        printf('Runing app'.PHP_EOL);
        $tree = new \application\Tree();
        foreach ($this->unsortedTree as $nodeKey => $nodeValue) {
            $tree->insert($nodeKey, $nodeValue->getAll());
            // $tree->root->
        }


        printf('Done'.PHP_EOL);
    }
}
