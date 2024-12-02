<?php

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Laptop\Shop\Demo\Demo;


class laptop_shop extends CModule
{
    public $MODULE_ID = 'laptop.shop';

    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;

    const TABLE_LIST = [
        'Laptop\Shop\Lib\Entities\LaptopOptionTable',
        'Laptop\Shop\Lib\Entities\ManufacturerTable',
        'Laptop\Shop\Lib\Entities\LaptopTable',
        'Laptop\Shop\Lib\Entities\ModelTable',
        'Laptop\Shop\Lib\Entities\OptionTable',
    ];


    public function __construct() {
        $arModuleVersion = [];

        include __DIR__ . '/version.php';

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->MODULE_NAME = Loc::getMessage('MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('MODULE_DESCRIPTION');
        $this->MODULE_GROUP_RIGHTS = 'Y';
    }

    public function DoInstall()
    {
        global $APPLICATION;
        $context = Application::getInstance()->getContext();
        $request = $context->getRequest();
        $step = (int)$request->get("step");

        if ($step < 2)
        {
            $APPLICATION->IncludeAdminFile(Loc::getMessage('YOUR_MODULE_INSTALL_TITLE'), __DIR__ . '/step1.php');
        }
        elseif ($step == 2)
        {
            if ($request->get('drop_tables') === 'Y') {
                ModuleManager::registerModule($this->MODULE_ID);
                $this->UnInstallDB();
                $this->InstallFiles();
                $this->InstallDB();
                $APPLICATION->IncludeAdminFile(Loc::getMessage('YOUR_MODULE_INSTALL_TITLE'), __DIR__ . '/step2.php');
            }
        }


    }

    public function DoUninstall()
    {
        $this->UnInstallDB();
        $this->UnInstallEvents();
        $this->UnInstallFiles();
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    public function InstallDB()
    {
        $connection = Application::getConnection();
        $demoContent = Demo::getData();
        foreach (self::TABLE_LIST as $table) {
            $tableName = $table::getTableName();
                if (!$connection->isTableExists($tableName)) {
                    $table::getEntity()->createDbTable();
                    if ($demoContent[$tableName]) {
                        foreach ($demoContent[$tableName] as $value) {
                            $table::add($value);
                        }
                    }
                }
        }
    }

    public function UnInstallDB()
    {
        if (Loader::includeModule($this->MODULE_ID))
        {
            $connection = Application::getConnection();
            foreach (self::TABLE_LIST as $table) {
                $tableName = $table::getTableName();
                if ($connection->isTableExists($tableName)) {
                    $connection->dropTable($tableName);
                }
            }
        }
    }

    public function InstallFiles() {
        CopyDirFiles(dirname(__DIR__, 2) .'/'.$this->MODULE_ID.'/install/components/', Application::getDocumentRoot() . '/local/components/', true, true);
    }

    // Other methods...
}