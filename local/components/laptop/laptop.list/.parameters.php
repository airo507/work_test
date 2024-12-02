<?php
use Bitrix\Main\Localization\Loc;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = [
    "PARAMETERS" => [
        "SEF_MODE" => [
            "list" => [
                "NAME" => Loc::getMessage('LIST_PATH'),
                "DEFAULT" => "/#SEF_FOLDER#/",
                "VARIABLES" => [],
            ],
        ],
        'VARIABLE_ALIASES' => [
            "BRAND_ID" =>  [
                "NAME" => Loc::getMessage('BRAND_PARAM'),
                "DEFAULT" => "/#BRAND#/",
            ],
            "MODEL_ID" =>  [
                "NAME" => Loc::getMessage('MODEL_PARAM'),
                "DEFAULT" => "/#MODEL#/",
            ],
        ]
    ],

];
?>