<?php
/**
 * vkf_wiesloch Theme Customizer
 *
 * @package vkf_wiesloch
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vkf_wiesloch_customize_register( $wp_customize ) {
	//$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	//$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	//$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'vkf_wiesloch_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */


function vkf_wiesloch_customize_preview_js() {
	wp_enqueue_script( 'vkf_wiesloch_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'vkf_wiesloch_customize_preview_js' );



function vkf_wiesloch_custom_customizer_register ( $wp_customize ) {
		//Remove standard setting
		$wp_customize->remove_control('blogdescription');
		$wp_customize->remove_section('nav');
		$wp_customize->remove_section('static_front_page');

		// Start Section

		$wp_customize->add_section('vkf_wiesloch_start_settings', array(
			'title' => __('Allgemein', 'vkf_wiesloch'),
			'description' => 'Settings for header section.'
		));
				$wp_customize->add_setting('headerimage', array(
					'default' => get_stylesheet_directory_uri() . '/img/header-bg.jpg'
				));
				$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'headerimage',  array(
					'label' => __('Header Image', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_start_settings',
					'setting' => 'headerimage'
				) ));

				$wp_customize->add_setting('headerlogo', array(
					'default' => get_stylesheet_directory_uri() . '/img/header-logo.png',
					'transport'=>'postMessage'
				));
				$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'headerlogo',  array(
					'label' => __('Header Logo', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_start_settings'
				) ));
				$wp_customize->add_setting('favicon', array(
					'default' => get_stylesheet_directory_uri() . '/img/favicon.png'
				));
				$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'favicon',  array(
					'label' => __('Favicon', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_start_settings',
					'setting' => 'favicon'
				) ));
		// Details Section

		$wp_customize->add_section('vkf_wiesloch_details_settings', array(
			'title' => __('Details', 'vkf_wiesloch'),
			'description' => 'Settings for Details section.'
		));
				$wp_customize->add_setting('details_background', array(
					'default' => '#fff',
					'transport'=>'postMessage'
				));
				$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'details_background',  array(
					'label' => __('Details Background', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_details_settings',
					'setting' => 'details_background'
				) ));


		// Calendar Section

		$wp_customize->add_section('vkf_wiesloch_calendar_settings', array(
			'title' => __('Calendar', 'vkf_wiesloch'),
			'description' => 'Settings for calendar section.'
		));
				$wp_customize->add_setting('calendar_headline', array(
					'default' => 'Anstehende Termine',
					'transport'=>'postMessage'
				));
				$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'calendar_headline',  array(
					'label' => __('Calendar Headline', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_calendar_settings',
					'setting' => 'calendar_headline'
				) ));
				$wp_customize->add_setting('calendar_background', array(
					'default' => '#e10f47',
					'transport'=>'postMessage'
				));
				$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'calendar_background',  array(
					'label' => __('Calendar Background', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_calendar_settings',
					'setting' => 'calendar_background'
				) ));

				$wp_customize->add_setting('calendaricon', array(
					'default' => get_stylesheet_directory_uri() . '/img/taschenlampe.png'
				));
				$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'calendaricon',  array(
					'label' => __('Calendar Icon', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_calendar_settings',
					'setting' => 'calendaricon'
				) ));


		// Checklist Section

		$wp_customize->add_section('vkf_wiesloch_checklist_settings', array(
			'title' => __('Checklist', 'vkf_wiesloch'),
			'description' => 'Settings for Checklist section.'
		));
				$wp_customize->add_setting('checklist_headline', array(
					'default' => 'Checkliste',
					'transport'=>'postMessage'
				));
				$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'checklist_headline',  array(
					'label' => __('Checklist Headline', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_checklist_settings',
					'setting' => 'checklist_headline'
				) ));
				$wp_customize->add_setting('checklist_subhead', array(
					'default' => 'Ich packe meinen Koffer und nehme mit…',
					'transport'=>'postMessage'
				));
				$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'checklist_subhead',  array(
					'label' => __('Checklist Subhead', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_checklist_settings',
					'setting' => 'checklist_subhead'
				) ));

				$wp_customize->add_setting('checklist_download', array(
					'default' => get_stylesheet_directory_uri() . '/img/checkliste.pdf'
				));
				$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'checklist_download',  array(
					'label' => __('Checklist PDF Download', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_checklist_settings',
					'setting' => 'checklist_download'
				) ));

				$wp_customize->add_setting('checklisticon', array(
					'default' => get_stylesheet_directory_uri() . '/img/checkliste-section-icon.png'
				));
				$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'checklisticon',  array(
					'label' => __('Checklist Icon', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_checklist_settings',
					'setting' => 'checklisticon'
				) ));
				$wp_customize->add_setting('checklistbgimage', array(
					'default' => get_stylesheet_directory_uri() . '/img/checkliste-bg.jpg'
				));
				$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'checklistbgimage',  array(
					'label' => __('Checklist BG Image', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_checklist_settings',
					'setting' => 'checklistbgimage'
				) ));


		// Alert Section

		$wp_customize->add_section('vkf_wiesloch_alert_settings', array(
			'title' => __('Alert', 'vkf_wiesloch'),
			'description' => 'Settings for Alert section.'
		));
				$wp_customize->add_setting('alert_post', array(
					'default' => '566',
				));
				$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'alert_post',  array(
					'label' => __('ID of alert post', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_alert_settings',
					'setting' => 'alert_post'
				) ));
				$wp_customize->add_setting('alert_background', array(
					'default' => '#fff',
					'transport'=>'postMessage'
				));
				$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'alert_background',  array(
					'label' => __('Alert Background', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_alert_settings',
					'setting' => 'alert_background'
				) ));


		// News Section

		$wp_customize->add_section('vkf_wiesloch_news_settings', array(
			'title' => __('News', 'vkf_wiesloch'),
			'description' => 'Settings for News section.'
		));
				$wp_customize->add_setting('news_headline', array(
					'default' => 'News und Neuigkeiten',
					'transport'=>'postMessage'
				));
				$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'news_headline',  array(
					'label' => __('News Headline', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_news_settings',
					'setting' => 'news_headline'
				) ));
				$wp_customize->add_setting('news_background', array(
					'default' => '#9d6f56',
					'transport'=>'postMessage'
				));
				$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'news_background',  array(
					'label' => __('News Background', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_news_settings',
					'setting' => 'news_background'
				) ));

				$wp_customize->add_setting('news_icon', array(
					'default' => get_stylesheet_directory_uri() . '/img/news-section-icon.png'
				));
				$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'news_icon',  array(
					'label' => __('Calendar Icon', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_news_settings',
					'setting' => 'news_icon'
				) ));


		// Team Section


		$wp_customize->add_section('vkf_wiesloch_team_settings', array(
			'title' => __('Teamer', 'vkf_wiesloch'),
			'description' => 'Settings for Teamer section.'
		));

				$wp_customize->add_setting('teamer_headline', array(
					'default' => 'Team',
					'transport'=>'postMessage'
				));
				$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'teamer_headline',  array(
					'label' => __('Teamer Headline', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_team_settings',
					'setting' => 'teamer_headline'
				) ));

				$wp_customize->add_setting('team_background', array(
					'default' => '#fff',
					'transport'=>'postMessage'
				));

				$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'team_background',  array(
					'label' => __('Team Background', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_team_settings',
					'setting' => 'team_background'
				) ));

				$wp_customize->add_setting('team_icon', array(
					'default' => get_stylesheet_directory_uri() . '/img/teamer-section-icon.png'
				));
				$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'team_icon',  array(
					'label' => __('Teamer Icon', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_team_settings',
					'setting' => 'team_icon'
				) ));


		// Footer Section

		$wp_customize->add_section('vkf_wiesloch_footer_settings', array(
			'title' => __('Footer', 'vkf_wiesloch'),
			'description' => 'Settings for Footer section.'
		));
				$wp_customize->add_setting('footer_headline', array(
					'default' => 'Kontakt und Anmeldung',
					'transport'=>'postMessage'
				));
				$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'footer_headline',  array(
					'label' => __('Footer Headline', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_footer_settings',
					'setting' => 'footer_headline'
				) ));
				$wp_customize->add_setting('footer_background', array(
					'default' => '#92a921',
					'transport'=>'postMessage'
				));

				$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_background',  array(
					'label' => __('Contact Background', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_footer_settings',
					'setting' => 'contact_background'
				) ));

				$wp_customize->add_setting('footericon', array(
					'default' => get_stylesheet_directory_uri() . '/img/kontakt-section-icon.png'
				));
				$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'footericon',  array(
					'label' => __('Footer Icon', 'vkf_wiesloch'),
					'section' => 'vkf_wiesloch_footer_settings',
					'setting' => 'footericon'
				) ));
}
add_action( 'customize_register', 'vkf_wiesloch_custom_customizer_register' );

function vkf_wiesloch_custom_customizer_css() {
	?>
	<style type="text/css">
	.home #content.site-content{
		background-color: <?php echo get_theme_mod('details_background', '#fff'); ?>;
	}
	.termine{
		background-color: <?php echo get_theme_mod('calendar_background', '#e10f47'); ?>;
	}
	.alert{
		background-color: <?php echo get_theme_mod('alert_background', '#fff'); ?>;
	}
	.news{
		background-color: <?php echo get_theme_mod('news_background', '#9d6f56'); ?>;
	}
	.team{
		background-color: <?php echo get_theme_mod('team_background', '#fff'); ?>;
	}
	footer{
		background-color: <?php echo get_theme_mod('footer_background', '#92a921'); ?>;
	}
	.checkliste{
		background-image: url('<?php echo get_theme_mod('checklistbgimage', get_stylesheet_directory_uri() . '/img/checkliste-bg.jpg'); ?>')!important;
	}
	</style>


	<?php
}

add_action('wp_head', 'vkf_wiesloch_custom_customizer_css');

