<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global $APPLICATION
 */

$APPLICATION->IncludeComponent(
    "laptop:laptop.list",
    "",
    Array(
        "DETAIL_URL" => '/#ELEMNT',
        "LIST_URL" => '/',
    )
);
