<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/6/4
 * Time: 下午8:32
 */

namespace App;


class Setting
{
    protected $user;

    protected $allowed = ['city', 'bio'];

    /**
     * Setting constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function merge(array $attributes)
    {

        $settings = array_merge($this->user->settings, array_only($attributes, $this->allowed));
        $this->user->settings = $settings;

        return $this->user->save();
    }
}