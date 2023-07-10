<?php
/**
 * Displays footer site info
 *
 * @subpackage Solar Renewable Energy
 * @since 1.0
 * @version 1.4
 */

?>

<div class="site-info py-4 text-center">
	<?php
		echo esc_html( get_theme_mod( 'organic_farm_footer_text' ) );

		printf(
            /* translators: %s: Solar Renewable Energy WordPress Theme. */
            esc_html__( ' %s ', 'solar-renewable-energy' ),
            '<a target="_blank" href="' . esc_url( 'https://www.ovationthemes.com/wordpress/free-solar-energy-wordpress-theme/') . '"> Solar Renewable Energy WordPress Theme</a>'
            
        );
	?>
</div>
