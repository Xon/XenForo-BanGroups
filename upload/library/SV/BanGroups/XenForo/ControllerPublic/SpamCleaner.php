<?php

class SV_BanGroups_XenForo_ControllerPublic_SpamCleaner extends XFCP_SV_BanGroups_XenForo_ControllerPublic_SpamCleaner
{
    public function actionIndex()
    {
        SV_BanGroups_Globals::$isSpamCleaningBan = true;
        return parent::actionIndex();
    }
}