<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 输入一颗二叉树的跟节点和一个整数，打印出二叉树中结点值的和为输入整数的所有路径。
 * 路径定义为从树的根结点开始往下一直到叶结点所经过的结点形成一条路径。
 * (注意: 在返回值的list中，数组长度大的数组靠前)
 */

require_once dirname(__DIR__) . '/Autoload.php';

class FindPath
{
    public function run1(TreeNode $root, int $expectNumber): ?array
    {
        if(is_null($root)){
            return [];
        }

        $currentSum = 0;
        $paths = [];
        $pathStack = new \SplStack();
        $this->find(
            $root,
            $expectNumber,
            $currentSum,
            $paths,
            $pathStack
        );

        return $paths;
    }

    private function find(
        TreeNode $root,
        int $expectNumber,
        int &$currentSum,
        array &$paths,
        \SplStack &$pathStack
    ): void
    {
        $currentSum += $root->val;
        $pathStack->push($root->val);

        $isLeaf = $root->left == null && $root->right == null;
        if($isLeaf && $currentSum == $expectNumber){
            $path = [];
            while($bottom = $pathStack->bottom()){
                $path[] = $bottom;
            }
            $paths[] = $path;
//
//            $pathStack->rewind();
//            while($val = $pathStack->current()){
//                $path[] = $val;
//                $pathStack->next();
//            }
//            $path = array_reverse($path);
//            $paths[] = $path;
        }

        if($root->left != null){
            $this->find(
                $root->left,
                $expectNumber,
                $currentSum,
                $paths,
                $pathStack
            );
        }

        if($root->right != null){
            $this->find(
                $root->right,
                $expectNumber,
                $currentSum,
                $paths,
                $pathStack
            );
        }

        /** @var TreeNode $top */
        $top = $pathStack->pop();
        $currentSum -= $top;
    }
}

// test
$f = new FindPath();

$treeNode4 = new TreeNode(4);
$treeNode7 = new TreeNode(7);
$treeNode5 = new TreeNode(5);
$treeNode5->left = $treeNode4;
$treeNode5->right = $treeNode7;
$treeNode12 = new TreeNode(12);
$treeNode10 = new TreeNode(10);
$treeNode10->left = $treeNode5;
$treeNode10->right = $treeNode12;

$paths = $f->run1($treeNode10, 22);
var_dump($paths);
