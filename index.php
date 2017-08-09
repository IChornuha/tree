#!/usr/bin/php
<?php
$memoryAtStart = memory_get_usage();

require '__autoload.php';
use application\App;
use application\LinkedList;

printf('We start now,  %s' . PHP_EOL, date('H:i:s'));
$maxNodes = $argv[1];
$leavesOnNode = $argv[2];
// Creating list of leaf for each 
$nodes = [];
for ($k = 0; $k <= (int)$maxNodes; $k++) {
    $list = new LinkedList();
    for ($i = 1; $i <= (int)$leavesOnNode; $i++) {
        $branch = new application\ListItem(random_int(0, 30), $i);
        $list->add($branch);
        unset($branch);
    }
    $nodes[]=$list;
}
(new App($nodes))->run();
$memoryAtFinish = memory_get_usage();
printf('Memory usage at finish: %d kB'.PHP_EOL, ($memoryAtFinish - $memoryAtStart)/ 1024);
