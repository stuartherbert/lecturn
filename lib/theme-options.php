<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'lecturn_options', 'lecturn_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'lecturn' ), __( 'Theme Options', 'lecturn' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

function theme_options_listOfColourSchemes()
{
        static $schemes = null;

        $schemesDir = get_template_directory() . '/colourSchemes';
        
        if ($schemes == null)
        {
                // step 1: do we have the colourSchemes folder?
                if (!is_dir($schemesDir))
                {
                        // no we do not
                        return array();
                }

                // step 2: do we have any schemes inside the folder?
                $contents = scandir($schemesDir);

                foreach ($contents as $filename)
                {
                        // skip over directories
                        if (!is_file($schemesDir . '/' . $filename))
                        {
                                continue;
                        }

                        // skip over non-colour-scheme files
                        if (!strstr($filename, '.scheme.php'))
                        {
                                continue;
                        }
                        $schemeName = str_replace('.scheme.php', '', $filename);
                        $schemes[$filename] = $schemeName;
                }
        }

        return $schemes;
}

/**
 * Create the options page
 */
function theme_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

        $validColourSchemes = theme_options_listOfColourSchemes();

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'lecturn' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'lecturn' ); ?></strong></p></div>
		<?php endif; ?>

                <div class="metabox-holder">
		<form method="post" action="options.php">
			<?php settings_fields( 'lecturn_options' ); ?>
			<?php $options = get_option( 'lecturn_theme_options' );  ?>

                        <div class="postbox">
                                <div class="handlediv" title="Click to toggle">
                                        <br/>
                                </div>
                                <h3 class="hndle"><span>Site Colours</span></h3>
                                <div class="inside">
                                        <p>Choose the colours to use for this site.  You can add new colour schemes by creating new files in the <strong>colourSchemes</strong> folder.</p>
                                        <table class="form-table">

                                                <!-- Colour options -->
                                                <tr valign="top"><th scope="row"><label for="lecturn_theme_options[colourScheme]"><?php _e( 'Colour Scheme', 'lecturn' ); ?></label></th>
                                                        <td>
                                                                <select name="lecturn_theme_options[colourScheme]">
                                                                        <?php
                                                                                $selected = $options['colourScheme'];
                                                                                $p = '';
                                                                                $r = '';

                                                                                foreach ( $validColourSchemes as $filename => $label ) {
                                                                                        if ( $selected == $filename ) // Make default first in list
                                                                                                $p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $filename ) . "'>" . esc_attr($label) . "</option>";
                                                                                        else
                                                                                                $r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $filename ) . "'>" . esc_attr($label) . "</option>";
                                                                                }
                                                                                echo $p . $r;
                                                                        ?>
                                                                </select>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                        </div>

                        <div class="postbox">
                                <div class="handlediv" title="Click to toggle">
                                        <br/>
                                </div>
                                <h3 class="hndle"><span>Typography</span></h3>
                                <div class="inside">
                                        <p>Customise this template by including fonts from <a href="http://www.typekit.com">TypeKit</a> or <a href="http://www.google.com/webfonts/">Google Web Fonts</a>, and setting which font to use for which part of the blog page.</p>

                                        <table class="form-table">
                                                <!-- Font options -->
                                                <tr valign="top"><th scope="row"><label for="lecturn_theme_options[useTypekit]"><?php _e( 'Use Typekit Fonts?', 'lecturn' ); ?></label></th>
                                                        <td>
                                                                <input id="lecturn_theme_options[useTypekit]" name="lecturn_theme_options[useTypekit]" type="checkbox" value="1" <?php checked( '1', $options['useTypekit'] ); ?> />
                                                        </td>
                                                </tr>
                                                <tr valign="top"><th scope="row"><label for="lecturn_theme_options[typekit]"><?php _e('Typekit Embed Code', 'lecturn'); ?></label></th>
                                                        <td>
                                                                <textarea id="lecturn_theme_options[typekit]" class="regular-text" cols="50" rows="10" name="lecturn_theme_options[typekit]"><?php echo esc_textarea( $options['typekit'] ); ?></textarea>
                                                        </td>
                                                </tr>
                                                <tr valign="top"><th scope="row"><label for="lecturn_theme_options[useGoogleWebFonts]"><?php _e( 'Use Google Web Fonts?', 'lecturn' ); ?></label></th>
                                                        <td>
                                                                <input id="lecturn_theme_options[useTypekit]" name="lecturn_theme_options[useGoogleWebFonts]" type="checkbox" value="1" <?php checked( '1', $options['useGoogleWebFonts'] ); ?> />
                                                        </td>
                                                </tr>
                                                <tr valign="top"><th scope="row"><label for="lecturn_theme_options[googleWebFonts]"><?php _e('Google Font Links', 'lecturn'); ?></label></th>
                                                        <td>
                                                                <textarea id="lecturn_theme_options[googleWebFonts]" class="regular-text" cols="50" rows="10" name="lecturn_theme_options[googleWebFonts]"><?php echo esc_textarea( $options['googleWebFonts'] ); ?></textarea>
                                                        </td>
                                                </tr>
                                                <tr valign="top"><th scope="row"><label for="lecturn_theme_options[body-font-family]"><?php _e('Main Reading Font', 'lecturn'); ?></label></th>
                                                        <td>
                                                                <input type="text" id="lecturn_theme_options[body-font-family]" class="regular-text" cols="50" rows="10" name="lecturn_theme_options[body-font-family]" value="<?php echo esc_attr_e( $options['body-font-family'] ); ?>"/>
                                                        </td>
                                                </tr>
                                                <tr valign="top"><th scope="row"><label for="lecturn_theme_options[article-heading-font-family]"><?php _e('Article Heading Font', 'lecturn'); ?></label></th>
                                                        <td>
                                                                <input type="text" id="lecturn_theme_options[article-heading-font-family]" class="regular-text" cols="50" rows="10" name="lecturn_theme_options[article-heading-font-family]" value="<?php echo esc_attr_e( $options['article-heading-font-family'] ); ?>"/>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                        </div>

                        <div class="postbox">
                                <div class="handlediv" title="Click to toggle">
                                        <br/>
                                </div>
                                <h3 class="hndle"><span>Social Sites</span></h3>
                                <div class="inside">
                                        <p>Which social networks do you want your readers to see links to? Leave these options blank to skip.</p>

                                        <table class="form-table">
                                                <tr valign="top"><th scope="row"><label for="lecturn_theme_options[twitterUser]"><?php _e('Twitter Account', 'lecturn'); ?></label></th>
                                                        <td>
                                                                <input type="text" id="lecturn_theme_options[twitterUser]" class="regular-text" cols="50" rows="10" name="lecturn_theme_options[twitterUser]" value="<?php echo esc_attr_e( $options['twitterUser'] ); ?>"/>
                                                        </td>
                                                </tr>
                                                <tr valign="top"><th scope="row"><label for="lecturn_theme_options[flickrUser]"><?php _e('Flickr Account', 'lecturn'); ?></label></th>
                                                        <td>
                                                                <input type="text" id="lecturn_theme_options[flickrUser]" class="regular-text" cols="50" rows="10" name="lecturn_theme_options[flickrUser]" value="<?php echo esc_attr_e( $options['flickrUser'] ); ?>"/>
                                                        </td>
                                                </tr>
                                                <tr valign="top"><th scope="row"><label for="lecturn_theme_options[googleUser]"><?php _e('Google Plus Profile URL', 'lecturn'); ?></label></th>
                                                        <td>
                                                                <input type="text" id="lecturn_theme_options[googleUser]" class="regular-text" cols="50" rows="10" name="lecturn_theme_options[googleUser]" value="<?php echo esc_attr_e( $options['googleUser'] ); ?>"/>
                                                        </td>
                                                </tr>
                                                <tr valign="top"><th scope="row"><label for="lecturn_theme_options[facebookUser]"><?php _e('Facebook Account', 'lecturn'); ?></label></th>
                                                        <td>
                                                                <input type="text" id="lecturn_theme_options[facebookUser]" class="regular-text" cols="50" rows="10" name="lecturn_theme_options[facebookUser]" value="<?php echo esc_attr_e( $options['facebookUser'] ); ?>"/>
                                                        </td>
                                                </tr>
                                                <tr valign="top"><th scope="row"><label for="lecturn_theme_options[linkedInUrl]"><?php _e('LinkedIn Public Profile URL', 'lecturn'); ?></label></th>
                                                        <td>
                                                                <input type="text" id="lecturn_theme_options[linkedInUrl]" class="regular-text" cols="50" rows="10" name="lecturn_theme_options[linkedInUrl]" value="<?php echo esc_attr_e( $options['linkedInUrl'] ); ?>"/>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                        </div>
				<?php
				/**
				 * A sample checkbox option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'A checkbox', 'lecturn' ); ?></th>
					<td>
						<input id="lecturn_theme_options[option1]" name="sample_theme_options[option1]" type="checkbox" value="1" <?php checked( '1', $options['option1'] ); ?> />
						<label class="description" for="lecturn_theme_options[option1]"><?php _e( 'Sample checkbox', 'lecturn' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A sample text input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Some text', 'lecturn' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext]" class="regular-text" type="text" name="sample_theme_options[sometext]" value="<?php esc_attr_e( $options['sometext'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext]"><?php _e( 'Sample text input', 'lecturn' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A sample select input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Select input', 'lecturn' ); ?></th>
					<td>
						<select name="sample_theme_options[selectinput]">
							<?php
								$selected = $options['selectinput'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="sample_theme_options[selectinput]"><?php _e( 'Sample select input', 'lecturn' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A sample of radio buttons
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Radio buttons', 'lecturn' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Radio buttons', 'lecturn' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $radio_options as $option ) {
								$radio_setting = $options['radioinput'];

								if ( '' != $radio_setting ) {
									if ( $options['radioinput'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="sample_theme_options[radioinput]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>

				<?php
				/**
				 * A sample textarea option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'A textbox', 'lecturn' ); ?></th>
					<td>
						<textarea id="sample_theme_options[sometextarea]" class="large-text" cols="50" rows="10" name="sample_theme_options[sometextarea]"><?php echo esc_textarea( $options['sometextarea'] ); ?></textarea>
						<label class="description" for="sample_theme_options[sometextarea]"><?php _e( 'Sample text box', 'lecturn' ); ?></label>
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'lecturn' ); ?>" />
			</p>
		</form>
                </div>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
        // colour scheme must be one of the schemes we support
        $validColourSchemes = theme_options_listOfColourSchemes();
        if (!isset($validColourSchemes[$input['colourScheme']]))
        {
                $input['colourScheme'] = null;
        }
        $input['colourScheme'] = wp_filter_nohtml_kses($input['colourScheme']);

        /*
	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );
        */

        // all the validation is done
        // now we need to rebuild our css files!
        theme_options_rebuildCss($input);
        
	return $input;
}

function theme_options_rebuildCss($options)
{
        $schemeDir = get_template_directory() . '/colourSchemes';
        $cssDir = get_template_directory() . '/cssTemplates';

        ob_start();
        include $schemeDir . '/' . $options['colourScheme'];
        include $cssDir . "/style-empty.css";
        include $cssDir . "/960.css";
        include $cssDir . "/lecturn.inc.php";

        $output = ob_get_contents();
        ob_end_clean();
        file_put_contents(get_template_directory() . '/style.css', $output);

}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/