<?php
function slider_gallery_images_display()
{
    wp_enqueue_media();

    global $post;

    $slide_images = get_post_meta($post->ID, 'slide_images', true);

    $slide_images_array = json_decode($slide_images, true);

    wp_nonce_field('save_slide_images', 'metabox_images');
?>

    <section class="upload-image-carousel">
        <h3>Selecione suas imagens</h3>
        <div class="image-carousel-wrapper">
            <div class="images-position">
                <div class="selected-images">
                    <?php
                    if ($slide_images_array) {
                        foreach ($slide_images_array as $position => $info) {
                            $alt = $info['alt'];
                            $url = $info['url'];
                            echo "<div class='image-selected' data-position='$position'><a class='btn-remove-image'></a><img src='$url' alt='$alt'></div>";
                        }
                    }
                    ?>
                </div>
                <a class="btn-upload-img" data-position="<?php echo count($slide_images_array) + 1; ?>"></a>
            </div>
        </div>
    </section>

    <input class="selected-images-id" name="selected-images-id" type="" value='<?php echo esc_attr($slide_images); ?>' />
<?php
}
?>