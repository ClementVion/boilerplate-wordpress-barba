<?php
/*
Plugin Name: Tartaucitron RGPD Log
Plugin URI: https://pureemaison.com/
Description: Historisation des consentements
Author: Purée Maison
Author URI: https://Pureemaison.com/
Version: 1.0
Text Domain: trtcitron_rgpd
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define('PLUGIN_NAME', plugin_basename(dirname(__FILE__)));

// Requirements
$plugin_dir_path = plugin_dir_path( __FILE__ );


/**
 * Plugin action
 *
 * @author Pureemaison
 * @return void
 */ 
function rgpd_log_page() {
    add_menu_page(  'RGPD',
                    'RGPD - Tarte au citron',
                    'manage_options',
                    'rgpd-manage',
                    'rgpd_config_page_options',
                    'dashicons-money',
                    100 );
}
add_action( 'admin_menu', 'rgpd_log_page' );


/**
 * Page dashboard plugin
 *
 * @author Pureemaison
 * @return void
 */ 
function rgpd_log_page_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }    
    ?>
    <h1><?php _e('RGPD Log'); ?> </h1>  
    <hr />
    <?php    
    get_list_log();
}




function rgpd_config_page_options() {
    if (!isset($_REQUEST['rgpd_options'])){
        $_REQUEST['settings-updated'] = false;
    }else{
        update_option( 'rgpd_options', $_REQUEST['rgpd_options'] );
    }
    ?>
    <div class="wrap">
        <?php echo "<h2>" . __('RGPD Config', 'tarteaucitron') . "</h2>"; ?>
        <?php if (false !== $_REQUEST['settings-updated']) : ?>
        <div class="updated fade"><p><strong><?php _e('Modification enregistrée', 'tarteaucitron'); ?></strong></p></div>
        <?php endif; ?>

        <form method="post" action="">            
            <?php $options = get_option('rgpd_options'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <?php _e('Tag Google analytics', 'tarteaucitron'); ?>
                    </th>
                    <td>
                        <input id="rgpd_options[analytics_tag]" 
                               class="regular-text" 
                               type="text" 
                               name="rgpd_options[analytics_tag]" 
                               value="<?php esc_attr_e($options['analytics_tag']); ?>" />
                    </td>
                </tr> 
                  				
            </table>
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Enregistrer', 'tarteaucitron'); ?>" />
            </p>
        </form>
    </div>
    <?php
}


function tarteaucitron_rgpd_js() { 
    wp_enqueue_style( 'tarteaucitron-rgpd-front-style', plugins_url() . '/tarteaucitron-rgpd/css/front.css' );
    
    wp_enqueue_script("jquery"); 
    wp_enqueue_script('tarteaucitron-rgpd-features', plugins_url() . '/tarteaucitron-rgpd/tarteaucitron/tarteaucitron.js');

}
add_action( 'wp_enqueue_scripts', 'tarteaucitron_rgpd_js' );

// Add scripts to wp_head()
function add_tarteaucitron_to_head_script() {   

    $options = get_option('pureemaison_options');
    ?>
    <script type="text/javascript">
        tarteaucitron.init({
            "privacyUrl": "<?php echo get_privacy_policy_url(); ?>", /* Privacy policy url */

            "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
            "cookieName": "tartaucitron", /* Cookie name */

            "orientation": "top", /* Banner position (top - bottom) */
            "showAlertSmall": false, /* Show the small banner on bottom right */
            "cookieslist": true, /* Show the cookie list */
            "AcceptAllCta" : true, /* Show the accept all button when highPrivacy on */
            "removeCredit": true, /* Remove credit link */
            "moreInfoLink": true, /* Show more info link */
            "useExternalCss": false, /* If false, the tarteaucitron.css file will be loaded */                  
            "readmoreLink": "<?php echo get_privacy_policy_url(); ?>", /* Change the default readmore link */
        });
        <?php if(isset($options['analytics_tag'])): ?>
        tarteaucitron.user.gtagUa = '<?= $options['analytics_tag']; ?>';            
        <?php endif; ?>

        tarteaucitron.services.cookie_history = {
            "key": "cookie_history",
            "type": "support",
            "name": "Cookie History",
            "needConsent": true,
            "cookies": ['cookie_history'],
            "readmoreLink": "<?php echo get_privacy_policy_url(); ?>",
            "uri": "<?php echo get_privacy_policy_url(); ?>",
            "js": function () {
                "use strict";
            },
            "fallback": function () {
                "use strict";
            }
        };
        (tarteaucitron.job = tarteaucitron.job || []).push('gtag');
        (tarteaucitron.job = tarteaucitron.job || []).push('cookie_history');
    </script>
    <?php 
}
add_action( 'wp_head', 'add_tarteaucitron_to_head_script' );

