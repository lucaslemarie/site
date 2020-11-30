<?php
function getMenu(array $items){
    $res='<ul class="list_menu">';
    foreach($items as $item){
        $res.="<li>$item</li>";
    }
    $res.='</ul>';
    echo $res;
}

?>
