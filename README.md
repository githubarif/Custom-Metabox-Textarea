# Custom-Metabox-Textarea

Contributor: Ariful Islam  
Tags: post, posts, meta box, custom meta box, Text area, Content, Title   
Requires at least: 2.0  
Tested up to: 4.1.1  
Stable tag: 1.0
License: GPLv2 or later  
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

This Plugin for creating custom metabox textarea in the WordPress admin area.

And show the value of textarea any where in your website.

= Installation =

1. Custom Metabox Textarea Plugin
2. In your WordPress Administration, go to Plugins > Add New > Upload, and select the plugin ZIP file.
3. Activate the plugin.
7. Done! The custom metabox textarea will appear on add/edit post.

Show the metabox textarea output is very simple. Just use this code in your template file.

<?php

    $meta_value = get_post_meta( get_the_ID(), 'textarea-meta-textarea', true );
 
    if( !empty( $meta_value ) ) {
        echo $meta_value;
    }
?>

It is very first release so doesn't support custom post type. Dont't Worry, for the next version it does.

= Support =

Contact the plugin author: <a href="http://arifislam.wix.com/portfolio">Ariful Islam</a>



== Screenshots ==

1.Text Area Metabox field

== Changelog ==

= 1.0 =
* Initial release
