<?php

function slider_gallery_options_display($post)
{
    // Recupere o valor atual do metabox e transforme ele em um array
    $slide_options = get_post_meta($post->ID, 'slide_options', true);
    $slide_options_array = json_decode($slide_options, true);

    // Use um nonce para verificar
    wp_nonce_field('save_slide_options', 'metabox_nonce');
?>
    <div>
        <div>
            <label for="slide_duration">Duração do slide: </label>
            <input type="text" id="slide_duration" name="slide_duration" value="<?php echo esc_attr($slide_options_array['slide_duration']); ?>">
        </div>
        <div>
            <label for="slide_transition">Transição da imagem: </label>
            <input type="text" id="slide_transition" name="slide_transition" value="<?php echo esc_attr($slide_options_array['slide_transition']); ?>">
        </div>
        <div>
            <label for="slide_loop">Loop no slide: </label>
            <input type="text" id="slide_loop" name="slide_loop" value="<?php echo esc_attr($slide_options_array['slide_loop']); ?>">
        </div>
        <div>
            <label for="slide_stop_on_hover">Parar slide quando mouse estiver em cima: </label>
            <input type="text" id="slide_stop_on_hover" name="slide_stop_on_hover" value="<?php echo esc_attr($slide_options_array['slide_stop_on_hover']); ?>">
        </div>
        <div>
            <label for="slide_navigation">Setas de navegação: </label>
            <input type="text" id="slide_navigation" name="slide_navigation" value="<?php echo esc_attr($slide_options_array['slide_navigation']); ?>">
        </div>
        <div>
            <label for="slide_show_pagination">Mostrar paginação: </label>
            <input type="text" id="slide_show_pagination" name="slide_show_pagination" value="<?php echo esc_attr($slide_options_array['slide_show_pagination']); ?>">
        </div>
    </div>
<?php
}
