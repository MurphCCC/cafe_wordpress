<!--  Pretty easy to understand, just spits out the description of a menu item from the database and puts it in its own div.  If we want to do custom styling for our description, this is where we would do it.-->
<div class="erm_product_desc"><?php echo do_shortcode( $the_post->post_content ); ?></div>
