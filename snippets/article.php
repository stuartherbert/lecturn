<?php

// ========================================================================
//
// lecturn/snippets/article.php
//              Common code to render one article
//
//              Part of the Lecturn theme for Wordpress
//
// Author       Stuart Herbert
//              (stuart@stuartherbert.com)
//
// Copyright    (c) 2008-2010 Stuart Herbert
//              All rights reserved
//
// ========================================================================

the_post();

// work out how many flickr views there have been so far
// 
// we have to cache this because Flickr API can be slow!

$flickrCacheFilename = md5($content);

?>
      <div class="entry">
        <div class="content-header">
          <h2 id="post-<?php the_ID(); ?>">
              <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
          </h2>
          <p>Posted by <?php the_author_link();?> on <?php the_time('F jS, Y');  ?>
          <?php if (!is_page()) { ?>
              in <?php the_category(', ');?>. <?php edit_post_link('Edit this', ' | ', ''); ?>
          </p>
          <?php } ?>
          <?php if (get_the_tag_list()) {?>
              <p>Tagged with <?php the_tags('', ', '); ?></p>
          <?php } ?>
        </div>
        <?php 
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	$content = str_replace(chr(160), ' ', $content);

	echo $content;

        ?>

        <?php if (!is_home()) { ?>
        <div class="content-author clearfix">
                <h3>About The Author</h3>
                <?php echo get_avatar(get_the_author_meta('user_email'), 64); ?>
                <div class="content-author-description">
                        <?php echo the_author_description(); ?>
                </div>
        </div>
        <?php } ?>

        <?php
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
