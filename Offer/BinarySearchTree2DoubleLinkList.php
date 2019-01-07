<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

/**
 * 输入一棵二叉搜索树，将该二叉搜索树转换成一个排序的双向链表。要求不能创建任何新的结点，只能调整树中结点指针的指向。
 * Class BinarySearchTree2DoubleLinkList
 * @package App\Offer
 */
class BinarySearchTree2DoubleLinkList
{
    public function convert(?TreeNode $pRoot): ?TreeNode
    {
        if (is_null($pRoot)) {
            return null;
        }

        $lastNodeInList = null;
        $this->convertTree2LinkList($pRoot, $lastNodeInList);

        while ($lastNodeInList != null && $lastNodeInList->left != null) {
            $lastNodeInList = $lastNodeInList->left;
        }

        return $lastNodeInList;
    }

    private function convertTree2LinkList(?TreeNode $pNode, ?TreeNode &$lastNodeInList): bool
    {
        if (is_null($pNode)) {
            return false;
        }

        $currentNode = $pNode;

        if ($currentNode->left) {
            $this->convertTree2LinkList($currentNode->left, $lastNodeInList);
        }

        $currentNode->left = $lastNodeInList;

        if ($lastNodeInList) {
            $lastNodeInList->right = $currentNode;
        }

        $lastNodeInList = $currentNode;

        if ($currentNode->right) {
            $this->convertTree2LinkList($currentNode->right, $lastNodeInList);
        }

        return false;
    }
}

$class = new BinarySearchTree2DoubleLinkList();
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

var_dump($node);

$cur = $node;
while($cur){
    echo $cur->val . ' ';
    $cur = $cur->right;
}

$doubleLinkList = $class->convert($node);
var_dump($doubleLinkList);
$cur = $doubleLinkList;
while($cur){
    echo $cur->val . ' ';
    $cur = $cur->right;
}