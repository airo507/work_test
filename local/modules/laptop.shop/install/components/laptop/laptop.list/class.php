<?php

use Bitrix\Main\ArgumentException;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use Laptop\Shop\Lib\Entities\LaptopOptionTable;
use Laptop\Shop\Lib\Entities\LaptopTable;
use Laptop\Shop\Lib\Entities\ManufacturerTable;
use Laptop\Shop\Lib\Entities\ModelTable;
use Laptop\Shop\Lib\Entities\OptionTable;

class LaptopsShopList extends CBitrixComponent {

    private const GRID_ID = "laptop_grid";

    private function getColumns()
    {
        return [
            [
                'id' => 'MANUFACTURE',
                'name' => Loc::getMessage('MANUFACTURE'),
                'sort' => 'MANUFACTURE',
                'default' => true
            ],
            [
                'id' => 'MODEL',
                'name' => Loc::getMessage('MODEL'),
                'sort' => 'MODEL',
                'default' => true
            ],
            [
                'id' => 'LAPTOP',
                'name' => Loc::getMessage('LAPTOP'),
                'sort' => 'LAPTOP',
                'default' => true
            ],
            [
                'id' => 'YEAR',
                'name' => Loc::getMessage('YEAR'),
                'sort' => 'YEAR',
                'default' => true
            ],
            [
                'id' => 'PRICE',
                'name' => Loc::getMessage('PRICE'),
                'sort' => 'PRICE',
                'default' => true
            ],
            [
                'id' => 'OPTIONS',
                'name' => Loc::getMessage('OPTIONS'),
                'sort' => 'OPTIONS',
                'default' => true
            ],
        ];
    }

    /**
     * @throws LoaderException
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    private function getData()
    {
        if (Loader::includeModule('laptop.shop')) {

            $modelsList = [];
            $manufactureList = [];
            $optionsList = [];
            $result = [];


            $options = OptionTable::getList([]);
            while ($option = $options->fetch()) {
                $optionsList[$option['ID']] = $option;
            }

            $manufactures = ManufacturerTable::getList([]);
            while ($manufacture = $manufactures->fetch()) {
                $manufactureList[$manufacture['ID']] = $manufacture;
            }
            $models = ModelTable::getList([]);
            while ($model = $models->fetch()) {
                $modelsList[$model['ID']]['NAME'] = $model['NAME'];
                $modelsList[$model['ID']]['MANUFACTURE_NAME'] = $manufactureList[$model['MANUFACTURER_ID']]['NAME'];
            }

            $laptops = LaptopTable::getList([]);
            while ($laptop = $laptops->fetch()) {
                $result[$laptop['ID']] = [
                    'NAME' => $laptop['NAME'],
                    'YEAR' => $laptop['YEAR'],
                    'PRICE' => $laptop['PRICE'],
                ];
                $result[$laptop['ID']]['MODEL_NAME'] = $modelsList[$laptop['MODEL_ID']]['NAME'];
                $result[$laptop['ID']]['MANUFACTURE_NAME'] = $modelsList[$laptop['MODEL_ID']]['MANUFACTURE_NAME'];
            }

            $laptopOptions = LaptopOptionTable::getList([]);
            while ($laptopOption = $laptopOptions->fetch()) {
                $result[$laptopOption['LAPTOP_ID']]['OPTIONS'][] = $optionsList[$laptopOption['OPTION_ID']]['NAME'];
            }

            foreach ($result as $elem) {
                $this->arResult['DATA'][] = [
                    'data' => [
                        'MANUFACTURE' => $elem['MANUFACTURE_NAME'],
                        'MODEL' => $elem['MODEL_NAME'],
                        'LAPTOP' => $elem['NAME'],
                        'YEAR' => $elem['YEAR'],
                        'PRICE' => $elem['PRICE'],
                        'OPTIONS' => implode(', ', $elem['OPTIONS']),
                    ]
                ];
            }

        }

    }

    public function executeComponent()
    {
        $this->getData();

        $this->arResult['GRID']['GRID_ID'] = self::GRID_ID;
        $this->arResult['GRID']['COLUMNS'] = $this->getColumns();

        $this->includeComponentTemplate();
    }
}
