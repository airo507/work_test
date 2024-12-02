<?php

namespace Laptop\Shop\Lib\Entities;

use Bitrix\Main\Application;
use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\SystemException;

Loc::loadMessages(__FILE__);

class ManufacturerTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'laptop_shop_manufacturer';
    }

    /**
     * @throws SystemException
     */
    public static function getMap()
    {
        return [
            new Entity\IntegerField('ID', array(
                'primary'      => true,
                'autocomplete' => true,
            )),
            new Entity\StringField('NAME', array(
                'required' => true,
            )),
        ];
    }
}