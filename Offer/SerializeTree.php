<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

/**
 * 请实现两个函数，分别用来序列化和反序列化二叉树
 * Class SerializeTree
 * @package App\Offer
 */
class SerializeTree
{
    private $treeStr = '';
    private $index = -1;
    private $flag = '#';
    private $separator = ',';

    public function mySerialize(?TreeNode $treeNode): ?string
    {
        $this->serializeTree($treeNode);

        return $this->treeStr;
    }

    private function serializeTree(?TreeNode $treeNode): void
    {
        if(is_null($treeNode)){
            $this->treeStr .= $this->flag;
            $this->treeStr .= $this->separator;
        }else{
            $this->treeStr .= $treeNode->val;
            $this->treeStr .= $this->separator;

            $this->serializeTree($treeNode->left);
            $this->serializeTree($treeNode->right);
        }
    }

    public function myDeSerialize(?string $treeStr): ?TreeNode
    {
        if(strlen($treeStr) == 0){
            return null;
        }

        $treeArr = explode($this->separator, $treeStr);
        $treeNode = $this->deSerializeTree($treeArr);

        return $treeNode;
    }

    private function deSerializeTree(array $treeArr): ?TreeNode
    {
        $this->index++;
        $count = count($treeArr);
        if($count > $this->index && $treeArr[$this->index] != $this->flag){
            $treeNode = new TreeNode(0);
            $treeNode->val = $treeArr[$this->index];
            $treeNode->left = $this->deSerializeTree($treeArr);
            $treeNode->right = $this->deSerializeTree($treeArr);

            return $treeNode;
        }

        return null;
    }
}

$class = new SerializeTree();
$treeNode1 = new TreeNode(1);
$treeNode2 = new TreeNode(2);
$treeNode3 = new TreeNode(3);
$treeNode1->left = $treeNode2;
$treeNode1->right = $treeNode3;
$treeStr = $class->mySerialize($treeNode1);
var_dump($treeStr);
$treeNode = $class->myDeSerialize($treeStr);
var_dump($treeNode);
echo '<hr>';
$class = new SerializeTree();
$treeStr = $class->mySerialize(null);
var_dump($treeStr);
$treeNode = $class->myDeSerialize($treeStr);
var_dump($treeNode);