<?php

namespace test;

class LinkedListTest
{
    public function testAddFunc()
    {
        $list = new \application\LinkedList();
        $list->add(new \application\ListItem('testValue', 42));
        $list->add(new \application\ListItem('42Value', 58));
        $firstListElement = $list->getFirst();
        \test\Testing::assertEquals('testValue', $firstListElement->getValue());
        echo 'passed' . \PHP_EOL;
    }


        public function testGetFunc()
    {
        $list = new \application\LinkedList();
        $list->add(new \application\ListItem('testValue', 42));
        $list->add(new \application\ListItem('42Value', 58));
        $firstListElement = $list->getFirst();  
        \test\Testing::assertEquals('42Value', $list->get($firstListElement->next())->getValue());
        echo 'passed' . \PHP_EOL;
    }
}
