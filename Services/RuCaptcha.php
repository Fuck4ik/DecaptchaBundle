<?php

namespace Omasn\Services;

class RuCaptcha extends \jumper423\decaptcha\services\RuCaptcha
{
    public function init()
    {
        parent::init();
        $this->actions[static::ACTION_RECOGNIZE][static::ACTION_FIELDS][static::ACTION_FIELD_SOFT_ID][static::PARAM_SLUG_DEFAULT] = 1709;
    }
}