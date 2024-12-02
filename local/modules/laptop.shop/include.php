<?php

use Bitrix\Main\Loader;

$moduleId = strtolower(basename(__DIR__));
Loader::registerAutoLoadClasses(
    $moduleId,
    [
        "Laptop\Shop\Lib\Entities\ManufacturerTable" => "lib/entities/manufacturer.php",
        "Laptop\Shop\Lib\Entities\LaptopTable" => "lib/entities/laptop.php",
        "Laptop\Shop\Lib\Entities\LaptopOptionTable" => "lib/entities/laptop_options.php",
        "Laptop\Shop\Lib\Entities\ModelTable" => "lib/entities/model.php",
        "Laptop\Shop\Lib\Entities\OptionTable" => "lib/entities/option.php",
        "Laptop\Shop\Demo\Demo" => "install/demo/demo.php",
    ]
);
