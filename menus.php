<?php

function buildTree(array $flatList, $parentKey, $idKey)
{
    $grouped = [];
    foreach ($flatList as $node){
        $grouped[$node[$parentKey]][] = $node;
    }
    $fnBuilder = function($siblings) use (&$fnBuilder, $grouped, $idKey) {
        foreach ($siblings as $k => $sibling) {
            $id = $sibling[$idKey];
            if(isset($grouped[$id])) {
                $sibling['children'] = $fnBuilder($grouped[$id]);
            }
            $siblings[$k] = $sibling;
        }
        return $siblings;
    };
    $tree = $fnBuilder($grouped[0]);
    return $tree;
}

function displayMenu($menus){
    echo "<ul>";
    foreach($menus as $key=>$menu){
        echo "<li>";        
        echo $menu['name'];
        if(!empty($menu['children'])){
            displayMenu($menu['children']);
        }
        echo "</li>";
    }
    echo "</ul>";
}

#อ่าน menu จาก json file มาเก็บใน array 2 มิติ 
$menus = json_decode(file_get_contents('menus.json'),true);
//var_dump($menus);

$tree_menus = buildTree($menus, 'parent_id', 'id');
//var_dump($tree_menus);

displayMenu($tree_menus);

?>