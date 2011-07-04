<?php

// ========================================================================
//
// newsprint/snippets/posts_loop.php
//              Common loop for a page containing one or more posts
//
//              Part of the Newsprint theme for Wordpress
//
// Author       Stuart Herbert
//              (stuart@stuartherbert.com)
//
// Copyright    (c) 2008 Stuart Herbert
//              All rights reserved
//
// ========================================================================

?>
<?php 
include TEMPLATEPATH . '/snippets/navigation.php'; 
?>
<div id="content">
  <div class="container_16">
    <div class="grid_11 content-article">
      <?php if (have_posts()) {
        while(have_posts()) {
            include(TEMPLATEPATH . '/snippets/article.php');
        }
        # posts_nav_link();
	wp_pagenavi();
      } else {
      ?>
        <h2>Not Found</h2>
        <?php include (TEMPLATEPATH . '/searchform.php'); ?>
      <?php } ?>
    </div>
    <div class="grid_5" id="content-sidebar">
      <?php dynamic_sidebar('Sidebar'); ?>
    </div>
  </div>
</div>
