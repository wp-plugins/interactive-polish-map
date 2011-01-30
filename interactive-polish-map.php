<?php
/*
Plugin Name: Interactive Polish Map
Description: Version: trunk
Author: Marcin Pietrzak
Author URI: http://iworks.pl
*/

/**
 * $HeadURL$
 * $LastChangedBy$
 * $LastChangedDate$
 */



/**
 * i18n
 */
$mo_file = dirname(__FILE__).'/lang/'.get_locale().'.mo';
if (file_exists($mo_file) && is_readable($mo_file)) {
    load_textdomain('interactive_polish_map', $mo_file);
}

$districts = array
    (
        'dolnoslaskie'        => 'Województwo Dolnośląskie',
        'kujawsko_pomorskie'  => 'Województwo Kujawsko-Pomorskie',
        'lubelskie'           => 'Województwo Lubelskie',
        'lubuskie'            => 'Województwo Lubuskie',
        'lodzkie'             => 'Województwo Łódzkie',
        'malopolskie'         => 'Województwo Małopolskie',
        'mazowieckie'         => 'Województwo Mazowieckie',
        'opolskie'            => 'Województwo Opolskie',
        'podkarpackie'        => 'Województwo Podkarpackie',
        'podlaskie'           => 'Województwo Podlaskie',
        'pomorskie'           => 'Województwo Pomorskie',
        'slaskie'             => 'Województwo Śląskie',
        'swietokrzyskie'      => 'Województwo Świętokrzyskie',
        'warminsko_mazurskie' => 'Województwo Warmińsko-Mazurskie',
        'wielkopolskie'       => 'Województwo Wielkopolskie',
        'zachodniopomorskie'  => 'Województwo Zachodniopomorskie'
    );

function ipm_admin_init()
{
    global $districts;
    foreach ( array_keys($districts) as $key ) {
        register_setting('ipm-options', 'ipm_districts_'.$key, 'wp_filter_nohtml_kses');
    }
    register_setting('ipm-options', 'ipm_type', 'absint');
}

function ipm_add_pages()
{
    add_submenu_page('options-general.php', __('Interactive Polish Map', 'interactive_polish_map'), __('Interactive Polish Map', 'interactive_polish_map'), 'edit_posts', 'solr-search-settings', 'ipm_settings');
}

function ipm_produce_radio($name, $title, $options)
{
    $option_value = get_option($name, 500);
    $content = sprintf('<h3>%s</h3>', $title);
    $content .= '<ul>';
    $i = 0;
    foreach ($options as $value => $label) {
        $id = $option['name'].$i++;
        $content .= sprintf
            (
                '<li><label for="%s"><input type="radio" name="%s" value="%s"%s id="%s"/> %s</label></li>',
                $id,
                $name,
                $value,
                ($option_value == $value)? ' checked="checked"':'',
                $id,
                $label
            );
    }
    $content .= '</ul>';
    echo $content;
}

function ipm_settings()
{
    global $districts;
?>
<div class="wrap">
    <h2><?php _e('Interactive Polish Map', 'interactive_polish_map') ?></h2>
    <form method="post" action="options.php">
        <?php ipm_produce_radio('ipm_type', __('Map width', 'interactive_polish_map'), array( '200'=>'200px', '300'=>'300px', '400'=>'400px', '500'=>'500px')); ?>
        <h3><?php _e('URL'); ?></h3>
        <table class="widefat">
<?php
    $i = 1;
    foreach ( $districts as $key => $value ) {
        $url = get_option('ipm_districts_'.$key, '');
        printf
            (
                '<tr%s><td style="width:150px">%s:</td><td><input type="text" name="ipm_districts_%s" value="%s" class="widefat"/></td></tr>',
                ++$i%2?' class="alternate"':'',
                $value,
                $key,
                $url
            );
    }
    settings_fields('ipm-options');
?>
        </table>
        <p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes', 'interactive_polish_map') ?>" /></p>
    </form>
</div>
<?php
}

function ipm_shortcode()
{
    global $districts;
    printf ('<div id="wojewodztwa" class="width%s"><ul id="w" class="ponizej dwie_kolumny">', get_option('ipm_type', 500));
    $i = 1;
    foreach ($districts as $key => $value) {
        $url = get_option('ipm_districts_'.$key, '%');
        if (!$url) {
            $url = '#';
        }
        printf
            (
                '<li id="w%d"><a href="%s" title="%s">%s</a></li>',
                $i++,
                $url,
                $value,
                $value
            );
    }
    echo '</ul></div>';
}

function ipm_init()
{
        $type = get_option('ipm_type', 500);
        wp_register_script( 'interactive_polish_map', plugins_url('/js/'.$type.'.js', __FILE__), array('jquery') );
        wp_enqueue_script('interactive_polish_map');
        wp_register_style('myStyleSheets', plugins_url('/style/'.$type.'.css', __FILE__) );
        wp_enqueue_style( 'myStyleSheets');
}


add_action('admin_menu', 'ipm_add_pages');
add_action('admin_init', 'ipm_admin_init');
add_action('init', 'ipm_init');
add_shortcode('mapa-polski', 'ipm_shortcode');

