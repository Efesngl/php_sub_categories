<?php


function buildTree($elem, $parent_id = 0)
{
    $branch = [];
    foreach ($elem as $el) {
        # code...
        if ($el->parent_id == $parent_id) {
            $child = buildTree($elem, $el->ID);
            if ($child) {
                $el->child = $child;
            }
            $branch[] = $el;
        }
    }
    return $branch;
}

function draw($items)
{
    echo "<ul>";
    foreach ($items as $i) {
        # code...
        echo "<li><a class='link-opacity-75-hover' href='libs/del_cats.php?cat_id={$i->ID}'>{$i->category}</a></li>";
        if (isset($i->child)) {
            draw($i->child);
        }
    }
    echo "</ul>";
}
