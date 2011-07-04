<?php

global $lecturn_all_settings;
$lecturn_all_settings = array
(
        'blogs' => array
        (
                'http://blog.stuartherbert.com/gentoo' => array
                (
                        'colorScheme' => 'SharpMinded',
                ),
                'http://blog.stuartherbert.com/personal' => array
                (
                        'colorScheme' => 'MalvernMood',
                ),
                'http://blog.stuartherbert.com/photography' => array
                (
                        'spotlight'   =>  '<div class="grid_11"><h2>Landscapes and Post-Industrial South Wales</h2>'
                                       . '<p>Stuart enjoys taking great photos and uncovering the stories behind them.</p>'
                                       . '<p>His main photography project is Merthyr Road - a look at the history and the legacy of the industrialisation of the South Wales Valleys.</p></div>'
				       . '<div class="grid_5"><a href="http://www.flickr.com/photos/stuartherbert/486829796/" title="Towards Pontypridd by Stuart Herbert, on Flickr"><img class="reflect rheight20 alignleft" src="http://farm1.static.flickr.com/214/486829796_fb64d93e14_m.jpg" width="240" height="151" alt="Towards Pontypridd" /></a></div>'
                ),
                'http://blog.stuartherbert.com/php' => array
                (
                        'spotlight' => '<div class="grid_11">'
                                       . '<h2>Learn More About PHP And The Web Platform!</h2>'
                                       . '<p>Struggling with your web server, or to scale your PHP application to meet growing demand?</p>'
                                       . '<p>Whether you\'re running one server or a whole server farm; whether you\'re hosting on Windows Server or on Linux.</p>'
                                       . '<p>Learn from Stuart\'s experience with system design, delivery, support and management to help you do a better job and have an easier time.</p>'
					. '</div><div class="grid_5">'
					.'<a href="http://www.flickr.com/photos/stuartherbert/240286041/" title="Beneath Whitby breakwater by Stuart Herbert, on Flickr"><img class="rheight15 reflect alignleft" src="http://farm1.static.flickr.com/97/240286041_1ef56155e5_m.jpg" width="240" height="185" alt="Beneath Whitby breakwater" /></a>'
					.'</div>',
                ),
                'http://blog.stuartherbert.com/tenprinciples' => array
                (
                        'spotlight' => '<div class="grid_11">'
                                       . '<h2>Ng Family Yang Style Tai Chi Chuan</h2>'
                                       . '<p>Stuart is both a student of, and instructor in, the Ng Family\'s take on Yang Style Tai Chi Chuan, under the instruction of Robert Earl Taylor.</p>'
                                       . '<p>Follow his discussions on studying the art and also on his experiences teaching the art to the next generation.</p>'
				       . '</div><div class="grid_5">'
				       . '<a href="http://www.flickr.com/photos/stuartherbert/760805526/" title="Lighting The Way Home by Stuart Herbert, on Flickr"><img class="reflect rheight15 alignleft" src="http://farm2.static.flickr.com/1298/760805526_de3ce86662_m.jpg" width="240" height="161" alt="Lighting The Way Home" /></a>'
				       . '</div>'
                ),
                'http://www.investinloss.com' => array
                (
                        'colorScheme' => 'SharpMinded',
                        'spotlight' => '<a href="http://www.flickr.com/photos/stuartherbert/1844332297/" title="Dawn on Caerphilly Mountain by Stuart Herbert, on Flickr"><img class="reflect rheight20 alignleft" src="http://farm3.static.flickr.com/2344/1844332297_94691f7d91.jpg" width="500" height="214" alt="Dawn on Caerphilly Mountain" /></a>'
                                       . '<h2>Free Yourself As A Manager</h2>'
                                       . '<p>Do you have all the management books, but they\'re not really helping?  Not quite sure what management is about?  Feel that you\'re making it up as you go along?</p>'
                                       . '<p>Invest In Loss is a principle-based philosophy of management that eschews tricks and trends for sustained change and results.</p>',
                        'properties' => array(),
                ),
        ),
        'properties' => array
        (
                'http://www.stuartherbert.com' => 'Bio',
		'http://blog.stuartherbert.com/' => 'All In One Page',
                'http://blog.stuartherbert.com/php/' => 'PHP',
                'http://blog.stuartherbert.com/photography/' => 'Photography',
                'http://blog.stuartherbert.com/tenprinciples/' => 'Tai Chi',
                'http://www.investinloss.com/' => 'Management',
                'http://blog.stuartherbert.com/personal/' => 'Personal',
        ),
);

?>
