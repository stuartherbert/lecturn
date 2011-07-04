<?php

// ========================================================================
//
// lecturn/snippets/navigation.php
//              Common code to display the 'next/prev' navigation
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

if (!is_home()) {
?>
<div id="nav">
  <div class="container_16">
    <div class="grid_11" id="nav-title">
      <ul class="hoz">
        <li class="first"><?php previous_post_link('&lt; %link | ', 'Previous Post') ?></li>
        <li class="middle"><a href="<?php bloginfo('url'); ?>">Home</a></li>
        <li class="last"><?php next_post_link('| %link &gt;','Next Post') ?></li>
      </ul>
    </div>
    <div class="grid_5" id="nav-sidebar">
      <p>&nbsp;</p>
    </div>
  </div>
</div>
<?php } ?>
