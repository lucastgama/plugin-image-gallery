<?php
function slider_gallery_preview_display()
{
    global $post;

    $slide_images = get_post_meta($post->ID, 'slide_images', true);

    $slide_images_array = json_decode($slide_images, true);
?>
    <div class="carousel-container">
        <div class="carousel">
            <?php
            if ($slide_images_array) {
                foreach ($slide_images_array as $position => $info) {
                    $alt = $info['alt'];
                    $url = $info['url'];
                    echo "<div class='carousel-item' data-position='$position'><img src='$url' alt='$alt'></div>";
                }
            }
            ?>
        </div>
        <div class="pagination"></div>
    </div>
<?php
}
?>