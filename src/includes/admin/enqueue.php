<?php

function slider_gallery_enqueue()
{
    global $typenow;
    var_dump("ssssssssssssssssssssssssssssssssssssssssssssss");

    var_dump($typenow);
    var_dump($typenow);
    var_dump($typenow);
    var_dump($typenow);
    var_dump($typenow);

    if ($typenow == 'slider_gallery') {
        var_dump("ssssssssssssssssssssssssssssssssssssssssssssss");
        var_dump("ssssssssssssssssssssssssssssssssssssssssssssss");
        var_dump("ssssssssssssssssssssssssssssssssssssssssssssss");
        return;
    }
}
add_action('init', 'slider_gallery_enqueue');
