<?php

namespace Kausar94\HastechAcademy;

/** Admin Class */
class Admin {

    /** Inilitize the class */
    function __construct(){
        $this->disptach_actions();

        new Admin\Menu();
    }

    public function disptach_actions(){
        $addressbook = new Admin\Addressbook();

        add_action('admin_init', [$addressbook,'form_handler'] );
    }
}