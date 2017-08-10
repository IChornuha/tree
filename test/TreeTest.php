<?php

namespace test;

class TreeTest extends \application\Tree
{
/**
 * Method getFirstUnsafeItemIndex return index of item in node->child array
 * contained value wich violates the followed rule: 
 * array_sum(node->child) < totalChildValueSum 
 * @return void
 */
    public function testGetFirstUnsaveIndexFunc()
    {
        $tree = new \application\Tree();
        $list = new \application\LinkedList();
        $list->add(new \application\ListItem(10, 1));
        $list->add(new \application\ListItem(13, 2));
        $list->add(new \application\ListItem(10, 3));

        $singleNode[] = $list;
        $node = new \application\Node(0, $list->getAll());
        $tree->unpackNodeChilds($node);
        $firstUnsafe = $tree->getFirstUnsafeItemIndex($node);
        \test\Testing::assertEquals(2, $firstUnsafe);
        echo 'passed' . \PHP_EOL;
    }

}
