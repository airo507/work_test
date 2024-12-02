<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global $APPLICATION
 */
echo '<pre>'; print_r('test'); echo '</pre>';
$APPLICATION->IncludeComponent(
    "laptop:laptop.list",
    "",
    [
        "list" => $arResult["FOLDER"],
        'VARIABLE_ALIASES' => [
            "BRAND_ID" =>  $arResult["VARIABLES"]["BRAND"],
            "MODEL_ID" =>  $arResult["VARIABLES"]["MODEL"],
            "LAPTOP_ID" => $arResult["VARIABLES"]["LAPTOP"],
        ]
    ]
);
