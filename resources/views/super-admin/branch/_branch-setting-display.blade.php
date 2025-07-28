<div>
    <div class="loader-position" id="displayLoading" hidden>
        <div class="spinner-border text-success spinner-width" role="status" id="displayLoader" hidden>
            <span class="visually-hidden"></span>
        </div>
    </div>
    <x-CustomCards.Card cardClass="card custom-card component-focus group-card" drag="true" cardId="settingDisplayCard" hiddenAttr="hidden">
        <x-CustomCards.CardHeaders.CardHeader cardHeaderClass="card-header custom-header" cardHeaderId="" hiddenAttr="">
            <x-Tables.Icon.SettingIcon iconWidth="20" iconHeight="15" firstFill="#686868" secondFill="#4a92ff" thirdFill="#4a92ff" fourFill="#4a92ff" />
            Display Branch Settings
        </x-CustomCards.CardHeaders.CardHeader>
        <x-CustomCards.CardBodies.CardBody cardBodyClass="card-body" cardBodyId="" hiddenAttr="">
            <x-UlListMenus.UlListMenu ulClassName="optation-box" ulPaddingClassName="" ulId="">
                <x-UlListMenus.UlListMenu ulClassName="setting-display" ulPaddingClassName="optation-padding" ulId="SettingDisplay" >
                    <!-- Show Setting Component Display -->
                </x-UlListMenus.UlListMenu>
            </x-UlListMenus.UlListMenu>
        </x-CustomCards.CardBodies.CardBody>
    </x-CustomCards.Card>
</div>