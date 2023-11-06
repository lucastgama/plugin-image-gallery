<?php

function slider_gallery_options_display($post)
{
    // Recupere o valor atual do metabox e transforme ele em um array
    $slide_options = get_post_meta($post->ID, 'slide_options', true);
    $slide_options_array = json_decode($slide_options, true);

    // Use um nonce para verificar
    wp_nonce_field('save_slide_options', 'metabox_nonce');
?>
    <div class="container_options_carousel">
        <div>
            <div class="container_option">
                <label for="slide_duration">Duração do slide: </label>
                <input type="text" id="slide_duration" name="slide_duration" value="<?php echo esc_attr($slide_options_array['slide_duration']); ?>">
                <span>segundos</span>
            </div>
            <div class="container_option">
                <label for="slide_transition">Transição da imagem: </label>
                <input type="text" id="slide_transition" name="slide_transition" value="<?php echo esc_attr($slide_options_array['slide_transition']); ?>">
                <span>segundos</span>
            </div>
            <div class="container_option">
                <label for="slide_loop">Loop no slide: </label>
                <input type="checkbox" id="slide_loop" name="slide_loop" value="1" <?php checked(esc_attr($slide_options_array['slide_loop']), 1); ?>>
            </div>
        </div>

        <div>
            <div class="container_option">
                <label for="slide_stop_on_hover">Parar slide quando mouse estiver em cima: </label>
                <input class="teste" type="checkbox" id="slide_stop_on_hover" name="slide_stop_on_hover" value="1" <?php checked(esc_attr($slide_options_array['slide_stop_on_hover']), 1); ?>>
            </div>
            <div class="container_option">
                <label for="slide_navigation">Setas de navegação: </label>
                <input type="checkbox" id="slide_navigation" name="slide_navigation" value="1" <?php checked(esc_attr($slide_options_array['slide_navigation']), 1); ?>>
            </div>
            <div class="container_option">
                <label for="slide_show_pagination">Mostrar paginação: </label>
                <input type="checkbox" id="slide_show_pagination" name="slide_show_pagination" value="1" <?php checked(esc_attr($slide_options_array['slide_show_pagination']), 1); ?>>
            </div>
        </div>
    </div>
<?php
}
