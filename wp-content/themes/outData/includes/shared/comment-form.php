<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<?php if($user_ID) : ?>
		<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
	<?php else : ?>
		<p>Login to submit a comment. <a href="/wp-login.php" title="Log in">Log in &raquo;</a></p></p>
		<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
		<label for="author"><small>Name <?php if($req) echo "(required)"; ?></small></label></p>
		<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
		<label for="email"><small>Mail (will not be published) <?php if($req) echo "(required)"; ?></small></label></p>
		<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
		<label for="url"><small>Website</small></label></p>
	<?php endif; ?>
	<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
	<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
	<?php do_action('comment_form', $post->ID); ?>
</form>
