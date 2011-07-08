<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> - <?php wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php

$options = get_option('lecturn_theme_options');
if (isset($options['googleWebFonts']) && isset($options['useGoogleWebFonts']) && $options['useGoogleWebFonts'])
        echo $options['googleWebFonts'] . "\n";
if (isset($options['typekit']) && isset($options['useTypekit']) && $options['useTypekit'])
        echo $options['typekit'] . "\n";

wp_head();

?>
</head>
<body>
<div id="properties">
  <div class="container_12">
    <div class="grid_8 list">
      <ul class="hoz links">
	<?= lecturn_echo_properties() ?>
      </ul>
    </div>
    <div class="grid_4 search">
      <form method="get" id="searchform" action="<?php bloginfo('url');?>/">
        <input type="text" value="search here ..." name="s" id="s" size="25"/>
        <input type="submit" id="searchsubmit" value="Search" />
      </form>
    </div>
  </div>
</div>
<div id="banner">
  <div class="container_16">
    <div class="grid_8 logo">
      <a href="<?php bloginfo('url'); ?>"><h1><?php bloginfo('name');?></h1></a>
      <p><?php bloginfo('description'); ?>
    </div>
    <div class="grid_8 subscribe">
      <ul class="hoz">
        <li><a href="<?php bloginfo('rss2_url');?>">Follow:</a>&nbsp;
          <a href="<?php bloginfo('rss2_url');?>"><img class="rss" src="<?php bloginfo('template_directory');?>/images/subscribe/rss.png" width="48" height="48"></a>
          <?php if (isset($options['twitterUser'])) {?><a href="http://twitter.com/<?= $options['twitterUser']?>"><image class="rss" src="<?php bloginfo('template_directory');?>/images/subscribe/twitter.png" width="48" height="48"></a><?php }?>
          <?php if (isset($options['flickrUser'])) {?><a href="http://flickr.com/photos/<?= $options['flickrUser']?>"><image class="rss" src="<?php bloginfo('template_directory');?>/images/subscribe/flickr.png" widtd="48" height="48"></a><?php }?>
          <?php if (isset($options['googleUser'])) {?><a href="<?= $options['googleUser']?>"><image class="rss" src="<?php bloginfo('template_directory');?>/images/subscribe/google.png" widtd="48" height="48"></a><?php }?>
          <?php if (isset($options['facebookUser'])) {?><a href="http://facebook.com/<?= $options['facebookUser']?>"><image class="rss" src="<?php bloginfo('template_directory');?>/images/subscribe/facebook.png" width="48" height="48"></a><?php }?>
          <?php if (isset($options['linkedInUrl'])) {?><a href="<?= $options['linkedInUrl']?>"><image class="rss" src="<?php bloginfo('template_directory');?>/images/subscribe/linkedin.png" width="48" height="48"></a><?php }?>
        </li>
      </ul>
    </div>
  </div>
</div>
<div id="pages">
  <div class="container_12">
    <div id="pages-inner" class="grid_12">
      <?php

      $out = wp_list_pages( array('title_li' => '', 'echo' => 0, 'sort_column' => 'menu_order', 'exclude' => '') );

      if ( !empty( $out ) )
      {
          echo '<ul class="hoz">';
          echo $out;
          echo "</ul>\n";
      }
      ?>
    </div>
  </div>
</div>
