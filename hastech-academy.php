<?php
/*
 * Plugin Name:       HasTech Academy
 * Plugin URI:        https://hastechacademy.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.0
 * Author:            Kausar Al Mamun
 * Author URI:        https://hastechacademy.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       hastech-academy
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')){
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';


/**
 * The main plugins class
 */
final class HasTech_Academy{

    /**
     * Plugin Version
     */
    const VERSION = '1.0';

    /**
     * class constructor
     */
    private function __construct(){

      $this->define_constants();

      register_activation_hook ( __FILE__ , [ $this, 'activate']);

      add_action('plugins_loaded', [$this, 'init_plugin']);
    }

    /***
     * Initilizes a singleton instance
     * @return \HasTech_Academy
     */
    public static function init(){
        static $instance = false;

        if(!$instance){
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugins constant
     * 
     * @return void
     */
    public function define_constants(){
        define('HS_ACADEMY_VERSION', self::VERSION);
        define('HS_ACADEMY_FILE', __FILE__ );
        define('HS_ACADEMY_PATH', __DIR__);
        define('HS_ACADEMY_URL', plugins_url('',HS_ACADEMY_FILE));
        define('HS_ACADEMY_ASSETS', HS_ACADEMY_URL. '/assets');
    }

    /**
     * Initiliaze the plugin
     * @return void
     */

    public function init_plugin(){
        if(is_admin()){
            new Kausar94\HastechAcademy\Admin();
        }else{
            new Kausar94\HastechAcademy\Frontend();
        }
    }

    /**
     * Do stuff upon plugin activation
     * 
     * @return void
     */
    public function activate(){

        $installed = get_option('hs_academy_installed');

        if( !$installed ){
            update_option('hs_academy_installed',time());
        }

        update_option('hs_academy_version', HS_ACADEMY_VERSION);
    }

}

/**
 * Initializes the main plugin
 * 
 * @return \HasTech_Academy
 */
function hastech_academy(){
    return HasTech_Academy::init();
}

//kick-off the plugin
hastech_academy();