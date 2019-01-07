<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

/**
 * 两个难点
 * 1>如何层级遍历
 * 2>如何单独保存每一层。这点更难，我想不到。
 * 从上到下按层打印二叉树，同一层结点从左至右输出。每一层输出一行。
 * Class PrintBinaryTree
 * @package App\Offer
 */
class PrintBinaryTree
{
    public function myPrint(?TreeNode $pRoot): array
    {
        if (is_null($pRoot)) {
            return [];
        }

        $queue = new \SplQueue();
        $queue->enqueue($pRoot);

        $nodes = [];

        while (!$queue->isEmpty()) {
            $count = $queue->count();
            $tmp = [];
            while ($count--) {
                $node = $queue->dequeue();
                $tmp[] = $node->val;

                $left = $node->left;
                if ($left != null) {
                    $queue->enqueue($left);
                }

                $right = $node->right;
                if ($right != null) {
                    $queue->enqueue($right);
                }
            }
            $nodes[] = $tmp;
        }

        return $nodes;
    }
}

$class = new PrintBinaryTree();

$node = new TreeNode(27);

$node1251 = new TreeNode(25);
$node1312 = new TreeNode(31);

$node2231 = new TreeNode(23);
$node2262 = new TreeNode(26);

$node2303 = new TreeNode(30);
$node2324 = new TreeNode(32);

$node1251->left = $node2231;
$node1251->right = $node2262;

$node1312->left = $node2303;
$node1312->right = $node2324;

$node->left = $node1251;
$node->right = $node1312;

$nodes = $class->myPrint($node);
var_dump($nodes);