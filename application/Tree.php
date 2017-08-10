<?php
declare (strict_types = 1);

namespace application;

use application\Node;

class Tree
{
    protected $root;
    private $totalChildValueSum;
    private $bucketOfLeaves;


    public function __construct(int $totalChildValueSum = 30)
    {
        $this->root = null;
        $this->totalChildValueSum = $totalChildValueSum;
    }

    public function isEmpty()
    {
        return $this->root === null;
    }

    public function insert($item, $child)
    {
        $node = new Node($item, $child);
        $this->prepareNode($node);
        if ($this->isEmpty()) {
            $this->root = $node;
        } else {
            // $this->prepareNode($node);
            $this->root->nodes[]=$node;
        }
    }

    /**
     * Simple bubble sort
     *
     * @param Node $node
     * @return void
     */
    protected function sortNodeChild(Node &$node)
    {
        for ($i = 0; $i < count($node->child) - 1; $i++) {
            for ($j = 0; $j < count($node->child) - 1; $j++) {
                if ($node->child[$j] > $node->child[ ($j + 1)]) {
                    list($node->child[$j], $node->child[ ($j + 1)]) = [
                            $node->child[ ($j + 1)],
                            $node->child[$j]
                        ];
                }
            }
        }
    }

    /**
     * Method getFirstUnsafeItemIndex return index of item in node->child array
     * contained value wich violates the followed rule:
     * array_sum(node->child) < totalChildValueSum
     */
    protected function getFirstUnsafeItemIndex($node):int
    {
        if ($this->bucketOfLeaves !== null) {
            $node->child = array_merge($node->child, $this->bucketOfLeaves);
        }
        $this->sortNodeChild($node);

        $childValueSum = 0;
        $k = 0;
        do {
            if (isset($node->child[$k])) {
                $childValueSum += $node->child[$k];
                $k++;
            }
        } while ($childValueSum <= $this->totalChildValueSum);
        $k--; //Index of first unsafe item
        return $k;
    }

    /**
     * Unpack Node child attribute array of ListItem instances
     * in to flat array of their values
     *
     * @param Node $node
     * @return void
     */
    protected function unpackNodeChilds(Node &$node)
    {
        foreach ($node->child as $key => &$value) {
            /**
             * @var ListItem $value
             */
            $value = $value->getValue();
        }
    }

    protected function prepareNode(&$node)
    {
        $this->unpackNodeChilds($node);
        if (array_sum($node->child) > $this->totalChildValueSum) {
            $firstUnsafeItemIndex = $this->getFirstUnsafeItemIndex($node);
            $newNodeChilds = array_slice($node->child, 0, $firstUnsafeItemIndex);
            $unnecessaryNodeChilds = array_slice($node->child, $firstUnsafeItemIndex);
            $node->child = $newNodeChilds;
            unset($newNodeChilds);
            $this->bucketOfLeaves = $unnecessaryNodeChilds;
        }
    }

    public function flushBucketOfLeaves()
    {
        unset($this->bucketOfLeaves);
    }
}
