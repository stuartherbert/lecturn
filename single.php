<?php

get_header();

include TEMPLATEPATH . '/snippets/navigation.php';
?>
<div id="content">
  <div class="container_16">
    <div class="grid_11 content-article">
      <?php include TEMPLATEPATH . '/snippets/article.php'; ?>
    </div>
    <div class="grid_5" id="content-sidebar">
      <?php dynamic_sidebar('Sidebar'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
