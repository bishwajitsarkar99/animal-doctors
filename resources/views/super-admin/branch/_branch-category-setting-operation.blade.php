<?php
    // Radio Button Groups
    $radioButtonGroups = [
        ['lable'=>'New Branch Category', 'lableClass'=>'form-check-label custom-label', 'lbFor'=>'flexRadioDefault5', 'btnClass'=>'form-check-input input-triger', 'btnType'=>'radio', 'btnName'=>'flexRadioDefaults', 'btnId'=>'flexRadioDefault5', 'checkedAttr'=>''],
        ['lable'=>'Branch Category Update', 'lableClass'=>'form-check-label custom-label', 'lbFor'=>'flexRadioDefault6', 'btnClass'=>'form-check-input input-triger', 'btnType'=>'radio', 'btnName'=>'flexRadioDefaults', 'btnId'=>'flexRadioDefault6', 'checkedAttr'=>'checked'],
        ['lable'=>'Branch Category Delete', 'lableClass'=>'form-check-label custom-label', 'lbFor'=>'flexRadioDefault7', 'btnClass'=>'form-check-input input-triger', 'btnType'=>'radio', 'btnName'=>'flexRadioDefaults', 'btnId'=>'flexRadioDefault7', 'checkedAttr'=>'checked'],
        ['lable'=>'None', 'lableClass'=>'form-check-label custom-label', 'lbFor'=>'flexRadioDefault8', 'btnClass'=>'form-check-input input-triger', 'btnType'=>'radio', 'btnName'=>'flexRadioDefaults', 'btnId'=>'flexRadioDefault8', 'checkedAttr'=>'checked']
    ];
?>
<x-CustomCards.Card cardClass="card custom-card component-focus group-card" drag="true" cardId="" hiddenAttr="">
    <x-CustomCards.CardHeaders.CardHeader cardHeaderClass="card-header custom-header" cardHeaderId="" hiddenAttr="">
        <x-Tables.Icon.SettingIcon iconWidth="20" iconHeight="15" firstFill="#686868" secondFill="#4a92ff" thirdFill="#4a92ff" fourFill="#4a92ff" />
        Setting Options
    </x-CustomCards.CardHeaders.CardHeader>
    <x-CustomCards.CardBodies.CardBody cardBodyClass="card-body" cardBodyId="" hiddenAttr="">
        <x-UlListMenus.UlListMenu ulClassName="optation-box" ulPaddingClassName="" ulId="">
            <x-UlListMenus.UlListMenu ulClassName="" ulPaddingClassName="optation-padding" ulId="settingModeTwo" >
                @foreach($radioButtonGroups as $data)
                    <li>
                        <x-Buttons.RadioButtons.RadioButton 
                            lableName="{{ $data['lable'] }}" 
                            lableClassName="{{ $data['lableClass'] }}" 
                            lableFor="{{ $data['lbFor'] }}"  
                            buttonClass="{{ $data['btnClass'] }}" 
                            buttonType="{{ $data['btnType'] }}" 
                            buttonName="{{ $data['btnName'] }}" 
                            buttonId="{{ $data['btnId'] }}" 
                            checkAttr="{{ $data['checkedAttr'] }}"
                        />
                    </li>
                @endforeach
            </x-UlListMenus.UlListMenu>
        </x-UlListMenus.UlListMenu>
    </x-CustomCards.CardBodies.CardBody>
</x-CustomCards.Card>