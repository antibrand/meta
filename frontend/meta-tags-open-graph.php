<?php
/**
 * Open Graph meta tags.
 *
 * @package    Meta_Tags
 * @subpackage Frontend
 *
 * @since      1.0.0
 *
 * @link       http://ogp.me/
 */

namespace Meta_Tags\Frontend;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>

<!-- Open Graph meta -->
<meta property="og:url" content="<?php esc_attr( esc_url( do_action( 'abmt_meta_url_tag' ) ) ); ?>" />
<meta property="og:type" content="website" />
<meta property="og:locale" content="<?php echo esc_attr( get_locale() ); ?>" />
<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
<meta property="og:title" content="<?php esc_attr( do_action( 'abmt_meta_title_tag' ) ); ?>" />
<?php if ( is_404() ) : ?>
<meta property="og:description" content="404 <?php esc_attr( _e( 'Not Found' ) ); ?>" />
<?php else : ?>
<meta property="og:description" content="<?php esc_attr( do_action( 'abmt_meta_description_tag' ) ); ?>" />
<?php endif; ?>
<meta property="og:image" content="<?php esc_attr( do_action( 'abmt_meta_image_tag' ) ); ?>" />
