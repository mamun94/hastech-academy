<?php 
namespace Kausar94\HastechAcademy;


/** Initialize Class */
class installer {
    
    /** Run the installer 
     * @return void
     */
    public function run(){
        $this->add_version();
        $this->create_tables();
    }

    public function add_version(){
        $installed = get_option('hs_academy_installed');

        if( !$installed ){
            update_option('hs_academy_installed',time());
        }

        update_option('hs_academy_version', HS_ACADEMY_VERSION);
    }

    /**
     * Create necessary database tables
     * @return void
     */
    public function create_tables(){
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $sechema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ac_addresses`(
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(100) NOT NULL DEFAULT '',
            `address` VARCHAR(120) DEFAULT NULL,
            `phone` VARCHAR(30) DEFAULT NULL,
            `created_by` BIGINT(11) UNSIGNED NOT NULL,
            `created_at` DATETIME NOT NULL,
            PRIMARY KEY(`id`)
        )$charset_collate";

        if(!function_exists('dbDelta')){
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        dbDelta($sechema);

    }
}