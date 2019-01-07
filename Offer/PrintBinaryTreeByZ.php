<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

/**
 * 请实现一个函数按照之字形打印二叉树，即第一行按照从左到右的顺序打印，第二层按照从右至左的顺序打印，第三行按照从左到右的顺序打印，其他行以此
 * 类推。
 * Class PrintBinaryTreeByZ
 * @package App\Offer
 */
class PrintBinaryTreeByZ
{
    public function myPrint(?TreeNode $pRoot): array
    {
        if (is_null($pRoot)) {
            return [];
        }

        $queue = new \SplQueue();
        $queue->enqueue($pRoot);

        $level = 1;
        $nodes = [];
        while (!$queue->isEmpty()) {
            $count = $queue->count();
            $tmp = [];
            while ($count--) {
                $node = $queue->dequeue();
                $tmp[] = $node->val;
                if ($node->left) {
                    $queue->enqueue($node->left);
                }

                if ($node->right) {
                    $queue->enqueue($node->right);
                }
            }

            if ($level % 2 == 0) {
                $total = count($tmp);
                $newTmp = [];
                for ($i = $total - 1; $i >= 0; $i--) {
                    $newTmp[] = $tmp[$i];
                }
                $tmp = $newTmp;
            }

            $level++;

            $nodes[] = $tmp;
        }

        return $nodes;
    }
}

$class = new PrintBinaryTreeByZ();

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