<?php
require '__autoload.php';
use application\LinkedList;

echo 'Start.';
$linkedListTest = new \test\LinkedListTest();
echo '  Linked list test'.PHP_EOL;
echo '      test \'add()\': ';
$linkedListTest->testAddFunc();

echo '      test \'get()\': ';
$linkedListTest->testGetFunc();


$treeTest = new \test\TreeTest();
echo '  Tree test'.PHP_EOL;
echo '      test \'getFirstUnsafeItemIndex()\': ';
$treeTest->testGetFirstUnsaveIndexFunc();

