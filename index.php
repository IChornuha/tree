<?php
require '__autoload.php';
use application\App;
use application\LinkedList;

printf('We start now,  %s' . PHP_EOL, date('H-i-s'));
$maxNodes = $argv[1];
$leafOnNode = $argv[2];
// Creating list of leaf for each 
$nodes = [];
$list = new LinkedList();
for ($k = 0; $k < (int)$maxNodes; $k++) {
    for ($i = 1; $i < (int)$leafOnNode; $i++) {
        $branch = new application\ListItem(random_int(0, 3), $i);
        $list->add($branch);
    }
    $nodes[]=$list;
} (new App($nodes))->run();
