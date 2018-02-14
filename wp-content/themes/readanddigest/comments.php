<div class="eltdf-comment-holder clearfix" id="comments">
	<div class="eltdf-comment-number">
		<h6><?php comments_number( esc_html__('No comments','readanddigest'), esc_html__('Latest comment','readanddigest'), esc_html__('Latest comments','readanddigest')); ?></h6>
	</div>
	<div class="eltdf-comments">
<?php if ( post_password_required() ) : ?>
		<p class="eltdf-no-password"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'readanddigest' ); ?></p>
	</div>
</div>
<?php
		return;
	endif;
?>
<?php if ( have_comments() ) : ?>
	<ul class="eltdf-comment-list">
		<?php wp_list_comments(array( 'callback' => 'readanddigest_comment')); ?>
	</ul>
<?php // End Comments ?>

 <?php else : // this is displayed if there are no comments so far 

	if ( ! comments_open() ) :
?>
		<!-- If comments are open, but there are no comments. -->

	 
		<!-- If comments are closed. -->
		<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'readanddigest'); ?></p>

	<?php endif; ?>
<?php endif; ?>
</div></div>
<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit_comment',
	'title_reply'=> esc_html__( 'LEAVE A COMMENT','readanddigest' ),
	'title_reply_to' => esc_html__( 'Post a Reply to %s','readanddigest' ),
	'cancel_reply_link' => esc_html__( 'Cancel Reply','readanddigest' ),
	'label_submit' => esc_html__( 'POST COMMENT','readanddigest' ),
	'comment_field' => '<textarea id="comment" placeholder="'.esc_html__( 'Write your comment here...','readanddigest' ).'" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="eltdf-two-columns-50-50 clearfix"><div class="eltdf-two-columns-50-50-inner"><div class="eltdf-column"><div class="eltdf-column-inner"><input id="author" name="author" placeholder="'. esc_html__( 'Name','readanddigest' ) .'" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div></div>',
		'url' => '<div class="eltdf-column"><div class="eltdf-column-inner"><input id="email" name="email" placeholder="'. esc_html__( 'E-mail','readanddigest' ) .'" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></div></div></div></div>',
		'email' => '<input id="url" name="url" type="text" placeholder="'. esc_html__( 'Website','readanddigest' ) .'" value="' . esc_attr( $commenter['comment_author_url'] ) . '" />'
		 ) ) 
	);
 ?>
<?php if(get_comment_pages_count() > 1){
	?>
	<div class="eltdf-comment-pager">
		<p><?php paginate_comments_links(); ?></p>
	</div>
<?php } ?>
 <div class="eltdf-comment-form">
	<?php comment_form($args); ?>
</div>