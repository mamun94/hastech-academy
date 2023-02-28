<?php

namespace Kausar94\HastechAcademy;

/** Admin Class */
class Admin {

    /** Inilitize the class */
    function __construct(){
        $addressbook = new Admin\Addressbook();

        $this->disptach_actions($addressbook);

        new Admin\Menu($addressbook);
    }

    /**
     * Control Action All Action  
     */
    public function disptach_actions($addressbook){
        add_action('admin_init', [$addressbook,'form_handler'] );
    }
}