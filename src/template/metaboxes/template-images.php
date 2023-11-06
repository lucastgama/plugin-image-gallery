<?php
function slider_gallery_images_display()
{
    // Carregue a biblioteca wp.media
    wp_enqueue_media();

    global $post;

    $upload_link = esc_url(get_upload_iframe_src('image', $post->ID));
    $your_img_id = get_post_meta($post->ID, '_your_img_id', true);
    $your_img_src = wp_get_attachment_image_src($your_img_id, 'full');
    $you_have_img = is_array($your_img_src);
?>

    <section class="upload-image-carousel">
        <h3>Selecione suas imagens</h3>
        <div class="image-carousel-wrapper">
            <div class="images-position">
                <div class="selected-images">
                </div>
                <a class="btn-upload-custom-img">
                </a>
            </div>

        </div>
    </section>


    <input class="custom-img-id" name="custom-img-id" type="hiddden" value="<?php echo esc_attr($your_img_id); ?>" />

    <!-- Your add & remove image links -->
    <p class="hide-if-no-js">
        <a class="delete-custom-img <?php if (!$you_have_img) {
                                        echo 'hidden';
                                    } ?>" href="#">
            <?php _e('Remove this image') ?>
        </a>
    </p>
<?php
}
