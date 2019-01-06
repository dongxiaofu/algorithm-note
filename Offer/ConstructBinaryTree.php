<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

/**
 * 输入某二叉树的前序遍历和中序遍历的结果，请重建出该二叉树。假设输入的前序遍历和中序遍历的结果中都不含重复的数字。例如输入前序遍历序列
 * {1,2,4,7,3,5,6,8}和中序遍历序列{4,7,2,1,5,3,8,6}，则重建二叉树并返回。
 * Class ConstructBinaryTree
 * @package App\Offer
 */
class ConstructBinaryTree
{
    public function reConstructBinaryTree(?array $pre, ?array $vin): ?TreeNode
    {
        if (is_null($pre) || is_null($vin) || empty($pre) || empty($vin)) {
            return null;
        }

        $root = $this->buildBinaryTree($pre, $vin);

        return $root;
    }

    private function buildBinaryTree(array $pre, array $vin): ?TreeNode
    {
        $preCount = count($pre);
        $vinCount = count($vin);
        if ($preCount != $vinCount || empty($preCount) || empty($vinCount)) {
            return null;
        }

        $rootV = $pre[0] ?? null;
        if (is_null($rootV)) {
            return null;
        }

        $rootIndexInVin = -1;
        foreach ($vin as $k => $v) {
            if ($v == $rootV) {
                $rootIndexInVin = $k;
                break;
            }
        }

        if ($rootIndexInVin == -1) {
            return null;
        }

        $leftInVin = [];
        $rightInVin = [];
        $count = count($vin);
        for ($i = 0; $i < $rootIndexInVin; $i++) {
            $leftInVin[] = $vin[$i];
        }

        for ($i = $rootIndexInVin + 1; $i < $count; $i++) {
            $rightInVin[] = $vin[$i];
        }

        $leftInVinCount = count($leftInVin);

        $leftInPre = [];
        $rightInPre = [];
        for ($i = 1; $i <= $leftInVinCount; $i++) {
            $leftInPre[] = $pre[$i];
        }

        for ($i = $leftInVinCount + 1; $i < $preCount; $i++) {
            $rightInPre[] = $pre[$i];
        }

        $root = new TreeNode($rootV);
        $left = $this->buildBinaryTree($leftInPre, $leftInVin);
        $root->left = $left;
        $right = $this->buildBinaryTree($rightInPre, $rightInVin);
        $root->right = $right;

        return $root;
    }
}

$class = new ConstructBinaryTree();
$pre = [1, 2, 4, 7, 3, 5, 6, 8];
$vin = [4, 7, 2, 1, 5, 3, 8, 6];
$root = $class->reConstructBinaryTree($pre, $vin);
var_dump($root->left, $root->right);