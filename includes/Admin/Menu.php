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
        $parent_slug = 'hastech-academy';
        $capability = 'manage_options';
        
        add_menu_page( __('HasTech Academy', 'hastech-academy'), __('Academy', 'hastech-academy'), $capability, $parent_slug, [$this, 'addressbook_page'], 'dashicons-welcome-learn-more' );

        add_submenu_page ( $parent_slug, __('Address Book', 'hastech-academy'), __('Address Book', 'hastech-academy'), $capability, $parent_slug, [$this, 'addressbook_page']);

        add_submenu_page ( $parent_slug, __('Settings', 'hastech-academy'), __('Settings', 'hastech-academy'), $capability, 'hastech-academy-settings', [$this, 'settings_page']);
    }

    /** Return the plugin page */
    public function addressbook_page(){
        $addressbook = new Addressbook();
        $addressbook->plugin_page();
    }

    public function settings_page(){
        echo 'Hello Address Book';
    }

}