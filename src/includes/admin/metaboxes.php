<?php
function slider_gallery_register_meta_boxes()
{
    add_action('add_meta_boxes', 'slider_gallery_metaboxes_images');
}


function slider_gallery_metaboxes_images()
{
    add_meta_box(
        'container-meta-box-images',
        __('Slider', 'slider_gallery'),
        'slider_gallery_images_display',
        'slider_gallery',
        "normal",
        'high'
    );
}

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

    <div class="upload-image-carousel">
        <h3>Selecione suas imagens</h3>
        <div class="image-carousel-wrapper">
            <div class="image-selected">
                <a class='btn-remove-image' href="">X</a>
                <img src="" alt="" style="">
            </div>
            <div class="custom-img-container">
                <?php if ($you_have_img) : ?>
                    <img src="<?php echo $your_img_src[0] ?>" alt="" style="width: 100px;object-fit: cover; height: 100px;" />
                <?php endif; ?>
            </div>
            <a class="upload-custom-img" style='height:100px;width:100px; background-color:#ddd; border:solid 1px #a9a9a9a9' href="<?php echo $upload_link ?>">
                +
            </a>
        </div>
    </div>


    <!-- <input class="custom-img-id" name="custom-img-id" type="hidden" value="<?php echo esc_attr($your_img_id); ?>" /> -->

    <!-- Your add & remove image links -->
    <p class="hide-if-no-js">
        <a class="delete-custom-img <?php if (!$you_have_img) {
                                        echo 'hidden';
                                    } ?>" href="#">
            <?php _e('Remove this image') ?>
        </a>
    </p>

    <script>
        jQuery(function($) {
            // Set all variables to be used in scope
            var frame,
                metaBox = $('#container-meta-box-images.postbox'), // Your meta box id here
                addImgLink = metaBox.find('.upload-custom-img'),
                delImgLink = metaBox.find('.delete-custom-img'),
                imgContainer = metaBox.find('.custom-img-container'),
                imgIdInput = metaBox.find('.custom-img-id'),
                imgSelected = metaBox.find('.image-selected'),
                removeImg = metaBox.find('.btn-remove-image');

            // ADD IMAGE LINK
            addImgLink.on('click', function(event) {

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if (frame) {
                    frame.open();
                    return;
                }

                // Create a new media frame
                frame = wp.media({
                    title: 'Select or Upload Media Of Your Chosen Persuasion',
                    button: {
                        text: 'Use this media'
                    },
                    multiple: true
                });
                frame.on('select', function() {
                    // Get media attachment details from the frame state
                    var attachment = frame.state().get('selection').first().toJSON();

                    // Send the attachment URL to our custom image input field.
                    imgContainer.append('<img src="' + attachment.url + '" alt="" style="width: 100px;object-fit: cover; height: 100px;"/>');

                    // Send the attachment id to our hidden input
                    imgIdInput.val(attachment.id);

                    console.log(imgIdInput)
                    // Unhide the remove image link
                    delImgLink.removeClass('hidden');
                });

                // Finally, open the modal on click
                frame.open();
            });


            // DELETE IMAGE LINK
            delImgLink.on('click', function(event) {
                event.preventDefault();
                // Clear out the preview image
                imgContainer.html('');
                // Un-hide the add image link
                addImgLink.removeClass('hidden');
                // Hide the delete image link
                delImgLink.addClass('hidden');
                // Delete the image id from the hidden nput
                imgIdInput.val('');


            });

            removeImg.on('click', function(event) {
                event.preventDefault();
                $(this).closest('div').remove();

            })

        });
    </script>

<?php
}
