<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/6/7
 * Time: 上午8:19
 */

namespace App;
use \Menu;


class Sidebar
{
    public function __construct()
    {
        Menu::make('MyNavBar', function($menu){

            $menu->add('Home');
            $menu->add('About',    'about')
                ->add('About-one', 'about-as')
                ->add('About-two', 'about-as');
            $menu->add('services', 'services');
            $menu->add('Contact',  'contact');
        });
    }
}