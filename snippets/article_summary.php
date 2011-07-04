<?php

// ========================================================================
//
// lecturn/snippets/article_summary.php
//              Common code to render one article
//
//              Part of the Lecturn theme for Wordpress
//
// Author       Stuart Herbert
//              (stuart@stuartherbert.com)
//
// Copyright    (c) 2008-2011 Stuart Herbert
//              All rights reserved
//
// ========================================================================

the_post();

?>
      <div class="entry">
        <div class="content-header">
	  <?php echo get_avatar(get_the_author_meta('user_email'), 32);?>
          <h2 id="post-<?php the_ID(); ?>">
              <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
          </h2>
          <p><strong>Posted by</strong> <?php the_author_link();?> @ <?php the_time('g:i A, D d M y');  edit_post_link('Edit this', ' | ', '')?></p>
          <?php if (!is_page()) { ?>
              <p><strong>Filed under:</strong> <?php the_category(','); ?></p>
          <?php } ?>
          <?php if (get_the_tag_list()) {?>
              <p><strong>Tags:</strong> <?php the_tags('', ', '); ?></p>
          <?php } ?>
          <p><?php comments_number(); ?></p>
        </div>
        <?php 
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	$content = str_replace(chr(160), ' ', $content);

	echo $content;
	
        if (is_single() || is_page())
        {
        	comments_template();
        }
        else
        {
        	comments_popup_link('Be the first to leave a comment &#187;', '1 comment &#187;', '% comments &#187;');
        }
        ?>
      </div>
