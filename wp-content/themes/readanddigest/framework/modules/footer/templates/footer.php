<?php
/**
 * Footer template part
 */
?>
</div> <!-- close div.content_inner -->
</div>  <!-- close div.content -->

<footer>
	<div class="eltdf-footer-inner clearfix">
		<?php
			if($display_footer_top) {
				readanddigest_get_footer_top();
			}
			if($display_footer_bottom) {
				readanddigest_get_footer_bottom();
			}
		?>
	</div>
</footer>

</div> <!-- close div.eltdf-wrapper-inner  -->
</div> <!-- close div.eltdf-wrapper -->
<?php wp_footer(); ?>
</body>
</html>