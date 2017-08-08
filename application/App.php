<?php
declare(strict_types=1);
namespace application;
use application\Tree;

class App
{
    private $incomeParamArray;
    public function __construct($incomeParamArray)
    {
        $this->incomeParamArray = $incomeParamArray;
    }

    public function run()
    {
        printf('Runing app'.PHP_EOL);
        $tree = new Tree();
        foreach ($this->incomeParamArray as $nodeKey => $nodeValue) {
            $tree->insert($nodeKey, $nodeValue->getAll());
        }


        printf('Done'.PHP_EOL);
    }
}
