<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

function Convert($pRootOfTree)
{
    // write code here
    if (is_null($pRootOfTree)) {
        return null;
    }

    $lastNodeInList = null;
    // 这样的小错误借住IDE才发现
//    ConvertTree2DoubleLinkList($pNode, $lastNodeInList);
    ConvertTree2DoubleLinkList($pRootOfTree, $lastNodeInList);

    while ($lastNodeInList != null && $lastNodeInList->left != null) {
        $lastNodeInList = $lastNodeInList->left;
    }

    return $lastNodeInList;
}

function ConvertTree2DoubleLinkList($pNode, &$lastNodeInList)
{
    if (is_null($pNode)) {
        return false;
    }
    $currentNode = $pNode;
    if ($currentNode->left) {
        ConvertTree2DoubleLinkList($currentNode->left, $lastNodeInList);
    }

    $currentNode->left = $lastNodeInList;
    if ($lastNodeInList != null) {
        $lastNodeInList->right = $currentNode;
    }

    $lastNodeInList = $currentNode;

    if ($currentNode->right) {
        ConvertTree2DoubleLinkList($currentNode->right, $lastNodeInList);
    }
}
