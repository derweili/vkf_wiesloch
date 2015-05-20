<?php
/* ------------------ */
/* theme options page */
/* ------------------ */

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

// Einstellungen registrieren (http://codex.wordpress.org/Function_Reference/register_setting)
function theme_options_init(){
	register_setting( 'kb_options', 'vkf_wiesloch_theme_options', 'kb_validate_options' );
}

// Seite in der Dashboard-Navigation erstellen
function theme_options_add_page() {
	add_theme_page('Optionen', 'Optionen', 'edit_theme_options', 'theme-optionen', 'vkf_wiesloch_theme_options_page' ); // Seitentitel, Titel in der Navi, Berechtigung zum Editieren (http://codex.wordpress.org/Roles_and_Capabilities) , Slug, Funktion 
}

// Optionen-Seite erstellen
function vkf_wiesloch_theme_options_page() {
global $select_options, $radio_options;
if ( ! isset( $_REQUEST['settings-updated'] ) )
	$_REQUEST['settings-updated'] = false; ?>

<div class="wrap"> 
<?php screen_icon(); ?><h2>Theme-Optionen für <?php bloginfo('name'); ?></h2> 

<?php if ( false !== $_REQUEST['settings-updated'] ) : ?> 
<div class="updated fade">
	<p><strong>Einstellungen gespeichert!</strong></p>
</div>
<?php endif; ?>

  <form method="post" action="options.php">
	<?php settings_fields( 'kb_options' ); ?>
    <?php $options = get_option( 'vkf_wiesloch_theme_options' ); ?>

    <table class="form-table">
      </tr>
       <tr valign="top">
        <th scope="row">Favicon</th>
        <td><input id="vkf_wiesloch_theme_options[favicon]" class="regular-text" type="text" name="vkf_wiesloch_theme_options[favicon]" value="<?php esc_attr_e( $options['favicon'] ); ?>" /><?php if( !empty($options['favicon']) ){echo '<img src="' . $options['favicon'] . '" class="faviconpreview" style="margin-left:10px;" />';} ?></td>
      </tr> 
      <tr valign="top">
        <th scope="row">Google Analytics</th>
        <td><textarea id="vkf_wiesloch_theme_options[analytics]" class="large-text" cols="50" rows="10" name="vkf_wiesloch_theme_options[analytics]"><?php echo esc_textarea( $options['analytics'] ); ?></textarea></td>

    </table>
    
    <!-- submit -->
    <p class="submit"><input type="submit" class="button-primary" value="Einstellungen speichern" /></p>
  </form>
</div>
<?php }

// Strip HTML-Code:
// Hier kann definiert werden, ob HTML-Code in einem Eingabefeld 
// automatisch entfernt werden soll. Soll beispielsweise im 
// Copyright-Feld KEIN HTML-Code erlaubt werden, kommentiert die Zeile 
// unten wieder ein. http://codex.wordpress.org/Function_Reference/wp_filter_nohtml_kses
function kb_validate_options( $input ) {
	// $input['copyright'] = wp_filter_nohtml_kses( $input['copyright'] );
	return $input;
}

?>