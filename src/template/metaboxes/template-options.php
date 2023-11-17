<?php

function slider_gallery_options_display($post)
{
    // Recupere o valor atual do metabox e transforme ele em um array
    $slide_options = get_post_meta($post->ID, 'slide_options', true);
    $slide_options_array = json_decode($slide_options, true);

    // Use um nonce para verificar
    wp_nonce_field('save_slide_options', 'metabox_nonce');
?>
    <div class="container-options-carousel">
        <div>
            <div class="container-option">
                <label for="slide-duration">Duração do slide: </label>
                <input type="text" id="slide-duration" name="slide-duration" value="<?php echo esc_attr($slide_options_array['slide_duration']); ?>">
                <span>segundos</span>
            </div>
            <div class="container-option">
                <label for="slide-transition">Transição da imagem: </label>
                <input type="text" id="slide-transition" name="slide-transition" value="<?php echo esc_attr($slide_options_array['slide_transition']); ?>">
                <span>segundos</span>
            </div>
            <div class="container-option">
                <label for="slide-transition">Quantas imagens por slide: </label>
                <input type="text" id="slide-amount" name="slide-amount" value="<?php echo esc_attr($slide_options_array['slide_amount']); ?>">
            </div>
            <div class="container-option">
                <label for="slide-loop">Loop no slide: </label>
                <input type="checkbox" id="slide-loop" name="slide-loop" value="1" <?php checked(esc_attr($slide_options_array['slide_loop']), 1); ?>>
            </div>
        </div>
        <div>
            <div class="container-option">
                <label for="slide-stop-on-hover">Parar slide quando mouse estiver em cima: </label>
                <input class="teste" type="checkbox" id="slide-stop-on-hover" name="slide-stop-on-hover" value="1" <?php checked(esc_attr($slide_options_array['slide_stop_on_hover']), 1); ?>>
            </div>
            <div class="container-option">
                <label for="slide-navigation">Setas de navegação: </label>
                <input type="checkbox" id="slide-navigation" name="slide-navigation" value="1" <?php checked(esc_attr($slide_options_array['slide_navigation']), 1); ?>>
            </div>
            <div class="container-option">
                <label for="slide-show-pagination">Mostrar paginação: </label>
                <input type="checkbox" id="slide-show-pagination" name="slide-show-pagination" value="1" <?php checked(esc_attr($slide_options_array['slide_show_pagination']), 1); ?>>
            </div>
        </div>
    </div>
<?php
}
?>