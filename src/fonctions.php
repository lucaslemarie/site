<?php
function getMenu(array $items){
    $res='<ul class="list_menu">';
    foreach($items as $item){
        $res.="<li>$item</li>";
    }
    $res.='</ul>';
    echo $res;
}
function getMenu1(array $items){
    $res='<ul class="social">';
    foreach($items as $item){
        $res.="<li>$item</li>";
    }
    $res.='</ul>';
    echo $res;
}
function getMenu2(array $items){
    $res='<ul id="exper">';
    foreach($items as $item){
        $res.="<li>$item</li>";
    }
    $res.='</ul>';
    echo $res;
}
function getMenu3(array $items){
    $res='<ul id="form">';
    foreach($items as $item){
        $res.="<li>$item</li>";
    }
    $res.='</ul>';
    echo $res;
}
?>
