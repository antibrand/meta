<?php
/**
 * Schema meta tags.
 *
 * @package    Meta_Tags
 * @subpackage Frontend
 *
 * @since      1.0.0
 */

namespace Meta_Tags\Frontend;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>

<!-- Schema meta -->
<meta itemprop="url" content="<?php do_action( 'abmt_meta_url_tag' ); ?>" />
<meta itemprop="name" content="<?php do_action( 'abmt_meta_title_tag' ); ?>" />
<meta itemprop="description" content="<?php do_action( 'abmt_meta_description_tag' ); ?>">
<meta itemprop="author" content="<?php do_action( 'abmt_meta_author_tag' ); ?>" />
<meta itemprop="datePublished" content="<?php do_action( 'abmt_meta_date_pub_tag' ); ?>" />
<meta itemprop="dateModified" content="<?php do_action( 'abmt_meta_date_mod_tag' ); ?>" />
<meta itemprop="image" content="<?php do_action( 'abmt_meta_image_tag' ); ?>" />
