<?php
declare(strict_types=1);

namespace App\Offer;


/**
 * 从上往下打印出二叉树的每个节点，同层节点从左至右打印。
 */

require_once dirname(__DIR__) . '/Autoload.php';

class TreeNode
{
    var $val;
    var $left = NULL;
    var $right = NULL;

    function __construct($val)
    {
        $this->val = $val;
    }
}

class PrintFromTopToBottom
{
    public function run1(TreeNode $root): array
    {
        $arr = [];
        $leftArr = [];
        $rightArr = [];
        $arr[] = $root->val;
        if($root->left){
            $leftArr = $this->run1($root->left);
        }


        if($root->right){
            $rightArr = $this->run1($root->right);
        }

        $res = array_merge($arr, $leftArr, $rightArr);
//        $res = $arr + $leftArr + $rightArr;

        return $res;
    }

    public function run2(TreeNode $root): array
    {
        $queue = new \SplQueue();
        $res = [];

        if(is_null($root)){
            return [];
        }

        while($root){
            $res[] = $root->val;
            if($root->left){
                $queue->enqueue($root->left);
            }

            if($root->right){
                $queue->enqueue($root->right);
            }

            if($queue->isEmpty()){
                $root = null;
            }else{
                $root = $queue->dequeue();
            }

        }

        return $res;
    }
}

// test
$p = new PrintFromTopToBottom();
$treeNode8 = new TreeNode(8);
$treeNode6 = new TreeNode(6);
$treeNode10 = new TreeNode(10);
$treeNode5 = new TreeNode(5);
$treeNode7 = new TreeNode(7);
$treeNode9 = new TreeNode(9);
$treeNode11 = new TreeNode(11);

$treeNode6->left = $treeNode5;
$treeNode6->right = $treeNode7;

$treeNode10->left = $treeNode9;
$treeNode10->right = $treeNode11;

$treeNode8->left = $treeNode6;
$treeNode8->right = $treeNode10;

$res = $p->run1($treeNode8);
var_dump($res);
// 打印结果 8 6 5 7 10 9 11，不符合题意

$res = $p->run2($treeNode8);
var_dump($res);