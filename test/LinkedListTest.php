<?php

namespace test;

class LinkedListTest{
    public function testAddFunc(){
        $list = new \application\LinkedList();
        $list->add(new \application\ListItem('testValue', 42));
        $list->add(new \application\ListItem('42Value', 0));
        \test\Testing::assertEquals('42Value', $list->getLast()->getValue());

    }
}