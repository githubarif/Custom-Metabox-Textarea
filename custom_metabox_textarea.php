<?php
 
/*
Plugin Name: Custom Metabox Textarea
Plugin URI: http://wordpress.org/plugin/custom_metabox_textarea
Description: Custom Metabox Textarea is a Plugin for creating custom metabox textarea in the WordPress post admin area. And show the value of textarea any where in your website.
Author: Ariful Islam
Version: 1.0
Author URI: http://arifislam.wix.com/portfolio
*/

/**
 * Adds a Custom Metabox Textarea to the post editing screen
 */
function textarea_custom_meta() {
    add_meta_box( 'textarea_meta', __( 'Metabox Textarea', 'textarea-textdomain' ), 'textarea_meta_callback', 'post', 'normal', 'high');
}
add_action( 'add_meta_boxes', 'textarea_custom_meta' );

/**
 * Outputs the content of the meta box
 */
function textarea_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'textarea_nonce' );
    $textarea_stored_meta = get_post_meta( $post->ID );
    ?>
	<p>
		<label for="meta-textarea" class="textarea-row-title"><?php _e( 'Add Your Content Here', 'textarea-textdomain' )?></label>
		<textarea name="textarea-meta-textarea" id="textarea-meta-textarea" style="width: 480px;height: 157px;"><?php if ( isset ( $textarea_stored_meta['textarea-meta-textarea'] ) ) echo $textarea_stored_meta['textarea-meta-textarea'][0]; ?></textarea>
	</p>
	<?php
}

/**
 * Saves the textarea custom meta input
 */
function textarea_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'textarea_nonce'] ) && wp_verify_nonce( $_POST[ 'textarea_nonce'], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and saves if needed
	if( isset( $_POST[ 'textarea-meta-textarea' ] ) ) {
		update_post_meta( $post_id, 'textarea-meta-textarea', $_POST[ 'textarea-meta-textarea' ] );
	}
 
}
add_action( 'save_post', 'textarea_meta_save');




?>
