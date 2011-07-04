<?php
function lecturn_option_ifset($options, $cssSetting, $optionName)
{
        if (isset($options[$optionName]))
        {
                echo $cssSetting . ': ' . $options[$optionName] . ";\n";
        }
}

function lecturn_option_or_default($options, $cssSetting, $optionName, $default)
{
        echo $cssSetting . ': ';
        if (isset($options[$optionName]))
        {
                echo $options[$optionName] . ";\n";
        }
        else
        {
                echo $default . ";\n";
        }
}

?>
.alignleft {
	text-align: left;
}

.aligncenter {
	text-align: center;
}

.alignright {
	text-align: right;
}

img {
	border: 0px;
}

img.photo, #content div.wp_geo_map {
	display: block;
	margin: auto;
	border: 5px solid #222;
        padding: 5px;
        background-color: #000;
        -webkit-box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
        -moz-box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
        box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
}

pre {
	background-color: <?= LECTURN_CONTENT_PRE_BG ?>;
        foreground-color: <?= LECTURN_CONTENT_PRE_FG ?>;
        border: 1px solid <?= LECTURN_CONTENT_FG ?>;
        padding: 10px;
}

ul li.icon {
	background-position: 0px 1px;
	background-repeat: no-repeat;
	padding-left: 20px;
}

ul.hoz {
	list-style-image: none;
	list-style-position: outside;
	list-style-type: none;
	padding-left: 0px;
}

ul.hoz li {
	display: inline;
}

/* IE work arounds - grrrr! */

p {
	margin-top: 13px;
	margin-bottom: 13px;
}

ul {
	margin-left: 0px;
	margin-top: 13px;
	margin-bottom: 13px;
}

li {
	margin-left: 0px;
}

html, body {
	margin: 0px;
	padding: 0px;
}

body {
	<?php lecturn_option_or_default($options, 'font-family', 'body-font-family', 'verdana, sans-serif'); ?>
	<?php lecturn_option_or_default($options, 'font-size', 'body-font-size', '10pt'); ?>
	background-color: #000;
	color: #000;
}

<?php

// ========================================================================
//
// Page areas:
//
// #properties		- the list of available blogs at the top of
//			  each page
// #banner		- the page's title area
// #pages		- the menu bar immediately below the title area
// #spotlight		- the page's headline area
// #nav			- the page's previous/home/next nav area
// #content		- the page's main content area
// #features		- the page's main navigation footer
// #footer		- the area at the very bottom of the page, for
//			  the attribution and repeat of available blogs
//
// Page areas may include CSS for Wordpress-specific constructs, such as
// the blog post calendar
//
// ========================================================================

?>

#properties {
        background-color: <?= LECTURN_PROPERTIES_BG ?>;
	color: <?= LECTURN_PROPERTIES_FG ?>;
	margin-top: 0px;
	width: 100%;
	float: left;
	height: 2em;
	border-bottom: 5px solid <?= LECTURN_PROPERTIES_SEARCH ?>;
}

#properties a, #properties a:visited, #properties a:active {
	color: <?= LECTURN_PROPERTIES_FG ?>;
	text-decoration: none;
}

#properties a:hover {
	color: <?= LECTURN_PROPERTIES_LINK ?>;
	text-decoration: underline;
}

#properties .list ul {
	text-align: left;
	font-size: 10pt;
	padding-left: 0pt;
	margin-top: 0.5em;
	margin-bottom: 0.5em;
}

#properties .list ul li {
	padding-right: 10px;
	font-size: 10pt;
}

#properties .search {
	height: 2em;
	vertical-align: top;
	text-align: center;
	background-color: <?= LECTURN_PROPERTIES_SEARCH ?>;
}

#banner {
        background-color: <?= LECTURN_BANNER_BG ?>;
	color: <?= LECTURN_BANNER_FG ?>;
	margin-top: 0px;
	width: 100%;
	float: left;
}

#banner .title a, #banner .title a:visited, #banner .title a:active {
        color: <?= LECTURN_BANNER_LINK_NORMAL ?>;
	text-decoration: none;
}

#banner .title a:hover {
	text-decoration: underline;
}

#banner div.logo {
        valign="middle";
}

#banner .logo a, #banner .logo a:visited, #banner .logo a:active {
        color: <?= LECTURN_BANNER_LINK_NORMAL ?>;
	text-decoration: none;
}

#banner .logo a:hover {
	text-decoration: underline;
}

#banner h1 {
	font-size: 24pt;
	font-weight: bold;
        color: <?= LECTURN_BANNER_TITLE ?>;
	margin: 0px;
	padding: 0px;
	margin-top: 25px;
}

#banner p {
	font-size: 12pt;
	margin-top: 5px;
	margin-bottom: 15px;
}

#banner ul {
        padding-top: 35px;
        padding-bottom: 35px;
        list-style-image: none;
        list-style-position: outside;
        list-style-type: none;
        text-align: right;
        font-size: 14pt;
        vertical-align: middle;
}

#banner ul li {
        padding-right: 10px;
        font-size: 14pt;
        display: inline;
}

#banner img {
        border: 0px;
}

#banner subscribe {
        vertical-align: middle;
	text-align: middle;
}

#banner ul li a, #banner ul li a:visited, #banner ul li a:active {
        color: <?= LECTURN_BANNER_LINK_NORMAL ?>;
        text-decoration: none;
}

#banner ul li a:hover {
        color: <?= LECTURN_BANNER_LINK_HOVER ?>;
        text-decoration: underline;
}

#banner ul li img.rss {
        vertical-align: middle;
}

#pages {
        background-color: <?= LECTURN_BANNER_BG ?>;
        color: <?= LECTURN_PAGES_FG ?>;
	width: 100%;
	float: left;
	border-bottom: 5px solid <?= LECTURN_BANNER_BOTTOM ?>;
}

#pages-inner {
	margin: auto;
        background-color: <?= LECTURN_PAGES_BG ?>;
	padding-top: 0.5em;
	padding-bottom: 0.5em;
	border-top: 1px solid <?= LECTURN_PAGES_BORDER ?>;
	border-left: 1px solid <?= LECTURN_PAGES_BORDER ?>;
	border-right: 1px solid <?= LECTURN_PAGES_BORDER ?>;
}

#pages a, #pages a:visited, #pages a:active {
	color: <?= LECTURN_PAGES_LINK_NORMAL ?> ;
	text-decoration: none;
}

#pages a:hover {
	color: <?= LECTURN_PAGES_LINK_HOVER ?>;
	text-decoration: underline;
}

#pages ul {
	text-align: left;
	font-size: 10pt;
	padding-left: 0pt;
	padding-top: 0.2em;
	padding-bottom: 0.2em;
	margin-top: 0px;
	margin-bottom: 0px;
}

#pages ul li {
	padding-left: 10px;
	padding-right: 10px;
	font-size: 10pt;
}

#spotlight {
        background-color: <?= LECTURN_SPOTLIGHT_BG ?>;
	color: <?= LECTURN_SPOTLIGHT_FG ?>;
	padding-top: 15px;
	padding-bottom: 15px;
	width: 100%;
	float: left;
	border-bottom: 5px solid <?= LECTURN_SPOTLIGHT_BOTTOM ?>;
}

#spotlight h2 {
	font-size: 18pt;
	font-weight: normal;
}

#spotlight img {
	border: 0px;
}

#spotlight p {
	font-size: 12pt;
	margin-right: 15px;
}

#spotlight p.credit {
	font-size: 8pt;
}

#spotlight img {
	border: 0px;
}

#spotlight a, #spotlight a:visited, #spotlight a:active {
	color: <?= LECTURN_SPOTLIGHT_LINK_NORMAL ?>;
	text-decoration: none;
}

#spotlight a:hover {
        color: <?= LECTURN_SPOTLIGHT_LINK_HOVER ?>;
	text-decoration: underline;
}

#nav {
	background-color: <?= LECTURN_CONTENT_BG ?>;
	color: <?= LECTURN_CONTENT_FG ?>;
	width: 100%;
	float: left;
        margin: auto;
}

#nav-title {
	background-color: <?= LECTURN_SPOTLIGHT_BG ?>;
        color: <?= LECTURN_SPOTLIGHT_FG ?>;
	margin-left: 0px;
	margin-right: 0px;
	padding-left: 10px;
	padding-right: 10px;
        border-left: 1px solid <?= LECTURN_SPOTLIGHT_BOTTOM ?>;
        border-bottom: 1px solid <?= LECTURN_SPOTLIGHT_BOTTOM ?>;
}

#nav-title a, #nav-title a:visited, #nav-title a:active {
        color: <?= LECTURN_SPOTLIGHT_LINK_NORMAL ?>;
        text-decoration: none;
}

#nav-title a:hover {
        color: <?= LECTURN_SPOTLIGHT_LINK_HOVER ?>;
        text-decoration: underline;
}

#nav-sidebar {
	background-color: <?= LECTURN_SPOTLIGHT_BG ?>;
	margin-left: 0px;
        border-bottom: 1px solid <?= LECTURN_SPOTLIGHT_BOTTOM ?>;
        border-right: 1px solid <?= LECTURN_SPOTLIGHT_BOTTOM ?>;
}

#content {
        background-color: <?= LECTURN_CONTENT_BG ?>;
 	color: <?= LECTURN_CONTENT_FG ?>;
	margin-top: 0px;
	width: 100%;
	float: left;
}

.content-article {
	padding-top: 30px;
        background-color: <?= LECTURN_CONTENT_BG ?>;
}

#content ul {
	padding-left: 40px;
}

div.content-header {
	display: block;
	width: 640px;
	padding-bottom: 10px;
	border-bottom: 2px solid <?= LECTURN_SPOTLIGHT_BOTTOM ?>;
}

.content-header ul {
	list-style-image: none;
	list-style-position: outside;
	list-style-type: none;
	text-align: left;
	vertical-align: middle;
	padding-left: 0px;
	margin-top: 0px;
	margin-bottom: 0px;
}

.content-header ul li {
	font-size: 10pt;
	display: inline;
	padding-right: 10px;
}

.content-header p {
	margin-top: 0px;
	margin-bottom: 0px;
        font-style: italic;
}

.content-header .photo {
        border: none;
        float: left;
        padding-right: 10px;
}

#content .content-article h2 {
        <?php lecturn_option_ifset($options, 'font-family', 'article-heading-font-family'); ?>
	font-size: 20pt;
        font-weight: normal;
	padding-bottom: 6px;
	margin-top: 0px;
	margin-bottom: 0px;
}

#content h3 {
	font-size: 12pt;
	font-weight: normal;
	letter-spacing: 1px;
	padding-top: 10px;
}

#content a, #content a:visited, #content a:active {
        color: <?= LECTURN_CONTENT_LINK_NORMAL ?>;
        text-decoration: none;
}

#content a:hover {
	color: <?= LECTURN_CONTENT_LINK_HOVER ?>;
        text-decoration: underline;
}

#content li + li {
	margin-top: 0.5em;
}

div.content-author {
        margin-top: 16px;
	border-top: 1px dotted <?= LECTURN_CONTENT_FG ?>;
}

.content-author .photo {
        float: left;
        background-color: #ddd;
        padding: 2px;
        border: 1px solid #eee;
        -webkit-box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
        -moz-box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
        box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
        margin-right: 10px;
        margin-bottom: 10px;
}

div.entry {
	margin-bottom: 20px;
}

div.entry + div.entry {
        padding-top: 10px;
}

#content input {
        padding: 7px 10px;
        border: none;
        outline: none;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
        -moz-box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
        box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
        background-color: <?= LECTURN_SPOTLIGHT_BG ?>;
        color: <?= LECTURN_SPOTLIGHT_FG; ?>
}

#content .nakedsidebar h3 {
	font-weight: bold;
	letter-spacing: 0px;
}

#content-sidebar {
	width: 270px;
	margin-left: 0px;
	padding-top: 20px;
	padding-bottom: 30px;
	padding-left: 10px;
	background-color: <?= LECTURN_CONTENT_BG ?>;
        color: <?= LECTURN_CONTENT_FG ?>;
	border-left: 1px solid <?= LECTURN_SPOTLIGHT_BOTTOM ?>;
}

#content-sidebar h2 {
	font-size: 12pt;
        font-weight: normal;
        background-color: <?= LECTURN_SPOTLIGHT_BG ?>;
        color: <?= LECTURN_SPOTLIGHT_FG ?>;
        -webkit-border-radius: 0px 5px 5px 0px;
        -moz-border-radius: 0px 5px 5px 0px;
        border-radius: 0px 5px 5px 0px;
        padding: 5px;
        padding-left: 10px;
        margin-left: -10px;
        border-bottom: 1px solid <?= LECTURN_SPOTLIGHT_BOTTOM ?>;
}

#content-sidebar ul {
	padding-left: 20px;
	margin-top: 0px;
	margin-bottom: 0px;
}

#content-sidebar div.flickr_photo, #content-sidebar div.flickr_photo_last {
	display: inline;
}

#content-sidebar div.flickr_photo img {
	display: inline;
}

#content-sidebar li + li {
	margin-top: 0px;
}

#content-sidebar #content-metadata {
	padding-bottom: 10px;
	border-bottom: 5px solid <?= LECTURN_SPOTLIGHT_BOTTOM ?>;
}

#content-sidebar #content-metadata ul {
	padding-left: 20px;
}

#content-sidebar #content-metadata ul li {
	padding-bottom: 2px;
}

#content-sidebar #content-metadata ul li.icon {
	list-style-image: none;
	list-style-position: outside;
	list-style-type: none;
}

#content-sidebar #content-metadata .postDate {
	text-align: center;
}

#content-sidebar #content-metadata .postDate .postDay {
	display:block;
	font-size:42pt;
	font-weight:bold;
	letter-spacing:-1px;
	line-height:26pt;
}

#content-sidebar #content-metadata .postDate .postMonth {
	display: block;
	font-size: 24pt;
	line-height: 26pt;
	text-transform: uppercase;
	font-weight: bold;
}

#content-sidebar #content-metadata .postDate .postYear {
	display: block;
	font-size: 24pt;
	line-height: 22pt;
	font-weight: normal;
}

#content-sidebar #content-metadata p.postAuthor {
	font-weight: bold;
}

#content-sidebar #content-metadata p.postCategories {
	text-align: left;
	display: block;
	padding-top: 10px;
	font-weight: bold;
}

#content-sidebar #content-metadata .postTags {
	text-align: left;
	display: block;
	padding-top: 10px;
	font-weight: bold;
}

#content-sidebar a, #content-sidebar a:visited, #content-sidebar a:active {
        color: <?= LECTURN_CONTENT_LINK_NORMAL ?>;
        text-decoration: none;
}

#content-sidebar a:hover {
        color: <?= LECTURN_CONTENT_LINK_HOVER ?>;
        text-decoration: underline;
}

#content-sidebar #wp-calendar {
        width: 100%;
}

#content-sidebar #wp-calendar caption {
        font-variant: small-caps;
        letter-spacing: 0.5em;
        padding-bottom: 10px;
}

#content-sidebar #wp-calendar th {
        text-align: center;
}

#content-sidebar #wp-calendar td {
        text-align: center;
        background-color: <?= LECTURN_CONTENT_BOTTOM ?>;
}

#content-sidebar #wp-calendar td.pad, #content-sidebar #wp-calendar td > a {
        background-color: <?= LECTURN_CONTENT_BG ?>;
        color: <?= LECTURN_CONTENT_FG ?>;
        padding-left: 5px;
        padding-right: 5px;
}

#content-sidebar #wp-calendar td a, #content-sidebar #wp-calendar td a:visited, #content-sidebar #wp-calendar td a:active {
        color: <?= LECTURN_CONTENT_LINK_NORMAL ?>;
        text-decoration: none;
}

#content-sidebar #wp-calendar td a:hover {
        color: <?= LECTURN_CONTENT_LINK_HOVER ?>;
        text-decoration: underline;
}

#comments-wrapper {
	background-color: <?= LECTURN_SPOTLIGHT_BG ?>;
        color: <?= LECTURN_SPOTLIGHT_FG ?>;
        width: 100%;
        float: left;
        border-bottom: 5px solid <?= LECTURN_SPOTLIGHT_BOTTOM ?>;
}

#comments-outer {
	width: 860px;
        margin: auto;
}

#comments #responses, #comments #respond {
	border-top: 1px dotted <?= LECTURN_CONTENT_FG ?>;
}

#comments input#author, #comments input#email, #comments input#url {
	width: 300px;
        background-color: #eeeeee;
}

#comments textarea#comment {
	width: 640px;
        background-color: #eeeeee;
}

#comments input#email {

}

#features {
        background-color: <?= LECTURN_SPOTLIGHT_BG ?>;
	color: <?= LECTURN_SPOTLIGHT_FG ?>;
	padding-top: 15px;
	padding-bottom: 15px;
	width: 100%;
	float: left;
	border-bottom: 5px solid <?= LECTURN_SPOTLIGHT_BOTTOM ?>;
}

div.feature {
	display: block;
	float: left;
	width: 225px;
	padding-right: 10px;
/*	border-top: 1px solid <?= LECTURN_SPOTLIGHT_FG ?>; */
}

#features h2 {
	font-size: 14pt;
	font-weight: normal;
}

#features ul {
	padding-left: 20px;
}

#features ul li {
	padding-top: 5px;
	padding-bottom: 5px;
}

#features a, #features a:visited, #features a:active {
	color: <?= LECTURN_SPOTLIGHT_LINK_NORMAL ?>;
	text-decoration: none;
}

#features a:hover {
	color: <?= LECTURN_SPOTLIGHT_LINK_HOVER ?>;
	text-decoration: underline;
}

#features #wp-calendar {
	width: 100%;
}

#features #wp-calendar caption {
	font-variant: small-caps;
        letter-spacing: 0.5em;
        padding-bottom: 10px;
}

#features #wp-calendar th {
        text-align: center;
}

#features #wp-calendar td {
        text-align: center;
}

#features #wp-calendar td a, #features #wp-calendar td a:visited, #features #wp-calendar td a:active {
        color: <?= LECTURN_SPOTLIGHT_CAL_NORMAL ?>;
        text-decoration: none;
}

#features #wp-calendar a:hover {
        color: <?= LECTURN_SPOTLIGHT_CAL_HOVER ?>;
        text-decoration: underline;
}
#footer {
	background-color: <?= LECTURN_BANNER_BG ?>;
	color: <?= LECTURN_BANNER_FG ?>;
	margin-top: 0px;
	width: 100%;
	padding-top: 15px;
	padding-bottom: 15px;
	float: left;
}

#footer #attribution {
	margin-top: 0px;
}

#footer #attribution p {
	margin-top: 13px;
}

#footer ul {
	list-style-image: none;
	list-style-position: outside;
	list-style-type: none;
	text-align: right;
	font-size: 10pt;
}

#footer ul li {
	padding-right: 10px;
	font-size: 10pt;
	display: inline;
}

#footer a, #footer a:visited, #footer a:active {
	color: <?= LECTURN_BANNER_LINK_NORMAL ?>;
	text-decoration: none;
}

#footer a:hover {
        color: <?= LECTURN_BANNER_LINK_HOVER ?>;
	text-decoration: underline;
}

