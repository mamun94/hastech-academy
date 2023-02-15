<?php 

//namespace Kausar94\HastechAcademy\Admin;
namespace Kausar94\HastechAcademy\Admin;

/**
 * The Menu handler class
 */
class Menu {
    
    function __construct()
    {
        add_action('admin_menu', [ $this, 'admin_menu' ]);
    }

    public function admin_menu(){
        add_menu_page( __('HasTech Academy', 'hastech-academy'), __('Academy', 'hastech-academy'), 'manage_options', 'hastech-academy', [$this, 'plugin_page'], 'dashicons-welcome-learn-more' );
    }

    public function plugin_page(){
        echo "Hello World";
    }
}