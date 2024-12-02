<?php


namespace Laptop\Shop\Lib\Entities;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;

Loc::loadMessages(__FILE__);

class LaptopOptionTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'laptop_shop_laptop_option';
    }

    public static function getMap()
    {
        return [
            new Entity\IntegerField('ID', [
                'primary'      => true,
                'autocomplete' => true,
            ]),
            new Entity\IntegerField('LAPTOP_ID'),
            new Reference('LAPTOP', LaptopTable::class, Join::on('this.LAPTOP_ID', 'ref.ID')),
            new Entity\IntegerField('OPTION_ID'),
            new Reference('OPTION', OptionTable::class, Join::on('this.OPTION_ID', 'ref.ID')),
        ];
    }
}