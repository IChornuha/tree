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

    protected function sortNodeChild(&$node)
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

    protected function getFirstUnsafeItemIndex($node)
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

    protected function unpackNodeChilds(&$node)
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
