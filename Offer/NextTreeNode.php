<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';


/**
 * 参考别人的代码写出了代码，但理解不了
 * 给定一个二叉树和其中的一个结点，请找出中序遍历顺序的下一个结点并且返回。注意，树中的结点不仅包含左右子结点，同时包含指向父结点的指针。
 * Class NextTreeNode
 * @package App\Offer
 */
class NextTreeNode
{
    public function getNextNode(?TreeLinkNode $pNode): ?TreeLinkNode
    {
        if ($pNode->right != null) {
            /** @var TreeLinkNode $right */
            $node = $pNode->right;
            while ($node->left) {
                $node = $node->left;
            }
            return $node;
        }

        /**
         * 如果是左结点A，A的父结点不就是下个结点吗？为何要遍历？
         */
        while ($pNode->next != null) {
            if ($pNode->next->left == $pNode) return $pNode->next;
            $pNode = $pNode->next;
        }

        return null;
    }
}

$class = new NextTreeNode();
$node1 = new TreeLinkNode(1);
$node2 = new TreeLinkNode(2);
$node2->next = $node1;
$node3 = new TreeLinkNode(3);
$node3->next = $node1;
$node1->left = $node2;
$node1->right = $node3;
var_dump($node1);
$target = $class->getNextNode($node1);
var_dump($target);