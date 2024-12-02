<?php

namespace Laptop\Shop\Lib\Entities;

use Bitrix\Main\Application;
use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;


Loc::loadMessages(__FILE__);

class ModelTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'laptop_shop_model';
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary'      => true,
                'autocomplete' => true,
            )),
            new Entity\StringField('NAME'),
            new Entity\IntegerField('MANUFACTURER_ID'),
            new Reference('MANUFACTURER', ManufacturerTable::class, Join::on('this.MANUFACTURER_ID', 'ref.ID')),
        );
    }
}