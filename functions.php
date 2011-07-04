<?php

// ========================================================================
//
// wordpress/themes/lecturn/functions.php
//              Helper functions for the Lecturn theme
//
//              Written for Wordpress 3.1+
//
// Author       Stuart Herbert
//              (stuart@stuartherbert.com)
//
// Copyright    (c) 2011 Stuart Herbert
//              All rights reserved
//
// ========================================================================

// ========================================================================
//
// WIDGET SUPPORT
//
// ========================================================================

// DO NOT CALL register_sidebars() AS IT IS BROKEN

// HOME PAGE sidebars

register_sidebar
(
        array (
                'name' => 'Features Footer',
                'before_widget' => '<div class="feature">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widgettitle">',
                'after_title' => '</h2>',
        )
);

// ARTICLE PAGE sidebar

register_sidebar
(
        array (
                'name' => 'Sidebar',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '<h2 class="widgettitle">',
                'after_title' => '</h2>',
        )
);

// ========================================================================

add_theme_support('post-thumbnails');
set_post_thumbnail_size(240,150);

// ========================================================================
//
// LIBRARY OF OPTIONS FUNCTIONS
//
// ========================================================================

require_once (get_template_directory() . '/lib/theme-options.php');

function lecturn_options_filename()
{
	return TEMPLATEPATH . '/settings.php';
}

/**
 * load the options that we store in the filesystem
 */

function lecturn_load_settings()
{
        global $lecturn_all_settings;

        // step 1: what is the name of the file?
        $filename = lecturn_options_filename();

        // step 2: load the file if it exists
	if (!file_exists($filename))
        {
        	$lecturn_all_settings = array();
        }
        else
        {
        	include($filename);
        }
}

/**
 * saves the options file out to the filesystem
 */

function lecturn_save_settings()
{
        // step 1: what is the name of the file?
        $filename = lecturn_options_filename();

        // step 2: create the data to save
        $fileContents = '<?php global $lecturn_all_settings; $lecturn_all_settings="' . var_export($lecturn_all_settings, true) . '";?>';

        // step 3: save the file to disk
        file_put_contents($filename, $fileContents);

        // all done
}

function lecturn_echo_properties()
{
	global $lecturn_all_settings;

	foreach ($lecturn_all_settings['properties'] as $url => $label)
	{
		echo '<li><a href="' . $url . '">' . $label . "</a></li>\n";
	}
}

// ========================================================================
//
// ACTIONS TO PERFORM ON LOAD
//
// ========================================================================

global $lecturn_all_settings;
global $lecturn_this_settings;

lecturn_load_settings();
$lecturn_this_settings = $lecturn_all_settings['blogs'][get_bloginfo('url')];

?>
