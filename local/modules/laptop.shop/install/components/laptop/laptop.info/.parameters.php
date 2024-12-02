<?php
use Bitrix\Main\Localization\Loc;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = [
    "PARAMETERS" => [
        "SEF_MODE" => [
            "brand_list" => [
                "NAME" => Loc::getMessage('LIST_PATH'),
                "DEFAULT" => "/#SEF_FOLDER#/",
                "VARIABLES" => [],
            ],
            "model_list" => [
                "NAME" => Loc::getMessage('LIST_PATH'),
                "DEFAULT" => "/#SEF_FOLDER#/#BRAND#/",
                "VARIABLES" => [],
            ],
            "laptop_list" => [
                "NAME" => Loc::getMessage('LIST_PATH'),
                "DEFAULT" => "/#SEF_FOLDER#/#BRAND#/#MODEL#/",
                "VARIABLES" => [],
            ],
            "detail" => [
                "NAME" => Loc::getMessage('DETAIL_PATH'),
                "DEFAULT" => "/#SEF_FOLDER#/detail/#NOTEBOOK#/",
                "VARIABLES" => [],
            ],
        ],
    ],
];
?>