<?php // Do not delete these lines
        if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
                die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
                if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
                        ?>

                        <p class="nocomments">This post is password protected. Enter the password to view comments.</p>

                        <?php
                        return;
                }
        }
?>
<div id="comments">
<?php if (have_comments()) {
?>
  <h3 id="responses"><?= comments_number('No Comments', 'One Comment', '% Comments'); ?></h3>
  <ol class="comments">
<?php
        while (have_comments()) {
                the_comment();
?>
        <li class="comment" id="comment-<?php comment_ID(); ?>">
          <a href="#comment-<?php comment_ID() ?>" title="">
            <cite><?php comment_author_link(); ?></cite> says:
          </a>
          <br/>
          <small><?php comment_date('F jS, Y') ?> at <?php comment_time() ?>
            <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></small>
          <?php if ($comment->comment_approved == '0') {?>
              <p><em>Your comment is awaiting moderation.</em></p>
          <?php } ?>
          <?php comment_text() ?>
        </li>
<?php
        }
?>
  </ol>
<?php
}
else
{
        // there are no comments to display
        if ('open' == $post->comment_status) { ?>
                <!-- If comments are open, but there are no comments. -->
        <?php } else { ?>
                <!-- If comments are closed. -->
                <p class="nocomments">Comments are closed.</p>
        <?php }
} ?>

  <div id="comments-footer">
<?php if ('open' == $post->comment_status)
{
?>
        <h3 id="respond">Add Your Comments To This Article Using The Form Below</h3>
        <?php if ( get_option('comment_registration') && !$user_ID ) { ?>
        <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
        <?php } else { ?>
                <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <?php if ( $user_ID ) { ?>
                        <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
                <?php } else { ?>
                        <p>
                        <label for="author">Your name<?php if ($req) echo " (required)"; ?>:</label><br/>
                        <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" />
                        </p>

                        <p>
                        <label for="email">Your email address (will not be published)<?php if ($req) echo " (required)"; ?>:</label><br/>
                        <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" />
                        </p>

                        <p>
                        <label for="url">Your website:</label><br/>
                        <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
                        </p>
                <?php } ?>

                <p>
                <label for="comment">Your comment:</label><br/>
                <textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
                <!-- <p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p> -->
                <p><input name="submit" type="submit" id="submit" tabindex="5" value="Send" />
                <input type="reset" tabindex="6" value="Clear" />
                <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
                </p>
                <?php do_action('comment_form', $post->ID); ?>
                </form>
                <p><small>Your comments may not appear until they have been approved by a moderator.</small></p>
        <?php }
}?>
  </div><!-- comments-footer -->
</div><!-- comments -->