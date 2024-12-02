<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<div class="laptop-shop-list">
    <?
    $APPLICATION->IncludeComponent(
        'bitrix:main.ui.grid',
        '.default',
        [
            'GRID_ID' => $arResult['GRID']['GRID_ID'],
            'HEADERS' => $arResult['GRID']['COLUMNS'],
            'ROWS' => $arResult['DATA'],
            'NAV_OBJECT' => $arResult['NAV'],
            'SHOW_SELECTED_COUNTER' => false,
            'SHOW_ROW_CHECKBOXES' => false,
            'SHOW_CHECK_ALL_CHECKBOXES' => false,
            'SHOW_ROW_ACTIONS_MENU' => false,
            'SHOW_GRID_SETTINGS_MENU' => true,
            'SHOW_TOTAL_COUNTER' => false,
            'SHOW_ACTION_PANEL' => false,
            'ALLOW_STICKED_COLUMNS' => false,
            'DISABLE_HEADERS_TRANSFORM' => true,
            'ALLOW_COLUMNS_SORT' => false,
            'ALLOW_COLUMNS_RESIZE' => true,
            'ALLOW_SORT' => true,
            'ALLOW_PIN_HEADER' => false,
            'SHOW_PAGESIZE' => true,
            'SHOW_NAVIGATION_PANEL' => true,
            'SHOW_PAGINATION' => true,
            'AJAX_MODE' => 'Y',
            'AJAX_OPTION_JUMP' => "N",
            'AJAX_OPTION_HISTORY' => "N",
            'ALLOW_HORIZONTAL_SCROLL' => true,
            'ENABLE_COLLAPSIBLE_ROWS' => false,
        ]
    )
    ?>
</div>

