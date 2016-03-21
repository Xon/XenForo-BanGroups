<?php

class SV_BanGroups_Installer
{
    public static function install($existingAddOn, $addOnData)
    {
        $version = isset($existingAddOn['version_id']) ? $existingAddOn['version_id'] : 0;

        if (empty($version))
        {
            if (XenForo_Application::getOptions()->addBanUserGroup)
            {
                // options haven't been created yet. Create a deferred task todo it after this
                XenForo_Application::defer('SV_BanGroups_Deferred_InstallHelper', array());
            }
        }

        return true;
    }
}
