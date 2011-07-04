#!/usr/bin/php
<?php
# ===========================================================================
#
# mkstyle.php
#		Generate a version of the Lecturn CSS files with the chosen
#		colours
#
#		Part of the Lecturn theme for websites and Wordpress
#
# Author	Stuart Herbert
#		(stuart@stuartherbert.com)
#
# Copyright	(c) 2010 Stuart Herbert
#		All rights reserved
#
# ===========================================================================

if (!isset($argv[1]))
{
	echo "*** error: no colour scheme recommended\n";
	exit(1);
}

ob_start();
include (basename($argv[1]));
include "./style-empty.css";
include "./960.css";
include "./lecturn.inc.php";

$output = ob_get_contents();
ob_end_clean();
file_put_contents(basename($argv[1], '.inc.php') . '.css', $output);

?>
