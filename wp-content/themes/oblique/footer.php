<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Oblique
 */
?>

		</div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<?php do_action( 'oblique_footer' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
	


	$("a.btn-lunch").click(function() {
		window.location.assign('lunch');
	});

	$("a.btn-weekday").click(function() {
		window.location.assign('weekday');
	});

</script>
</body>
</html>
