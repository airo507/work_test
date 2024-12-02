<?php

class LaptopsShop extends CBitrixComponent {

    public function executeComponent()
    {
        $arDefaultUrlTemplates404 = [
            'brand_list' => '/#SEF_FOLDER#/',
            'model_list' => '/#SEF_FOLDER#/#BRAND#/',
            'laptop_list' => '/#SEF_FOLDER#/#BRAND#/#MODEL#/',
            'detail' => '/#SEF_FOLDER#/detail/#NOTEBOOK#/ ',
        ];
        $arDefaultVariableAliases404 = [];
        $arDefaultVariableAliases    = [];
        $arUrlTemplates              = [];
        $arComponentVariables = ["SEF_FOLDER", "BRAND", "MODEL", "NOTEBOOK"];
        $variables = [];

        foreach ($arDefaultUrlTemplates404 as $page => $path)
        {
            if (!isset($this->arParams['SEF_URL_TEMPLATES'][$page]))
            {
                $this->arParams['SEF_URL_TEMPLATES'][$page] = $path;
            }
        }

        if ($this->arParams['SEF_MODE'] == 'Y') {

            $arVariables = [];
            $arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates(
                $arDefaultUrlTemplates404,
                $this->arParams['SEF_URL_TEMPLATES']
            );

            $arVariableAliases = CComponentEngine::MakeComponentVariableAliases(
                $arDefaultVariableAliases404,
                $this->arParams['VARIABLE_ALIASES']
            );
            $componentPage = CComponentEngine::ParseComponentPath(
                $this->arParams['SEF_FOLDER'],
                $arUrlTemplates,
                $arVariables
            );

            CComponentEngine::InitComponentVariables(
                $componentPage,
                $arComponentVariables,
                $arVariableAliases,
                $arVariables);
                $SEF_FOLDER = $this->arParams['SEF_FOLDER'];


            $this->arResult = array(
                "FOLDER" => $this->arParams["SEF_FOLDER"],
                "URL_TEMPLATES" => $arUrlTemplates,
                "VARIABLES" => $arVariables,
                "ALIASES" => $arVariableAliases,
            );
        }


        $this->includeComponentTemplate();
    }
}
