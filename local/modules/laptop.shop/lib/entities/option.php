<?php

namespace Laptop\Shop\Lib\Entities;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;

Loc::loadMessages(__FILE__);

class OptionTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'laptop_shop_option';
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true,
            )),
            new Entity\StringField('NAME'),
            new Entity\IntegerField('LAPTOP_ID'),
        );
    }
}
