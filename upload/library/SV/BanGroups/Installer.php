<?php

class SV_BanGroups_Installer
{
    public static function install($existingAddOn, $addOnData)
    {
        $required = '5.5.0';
        $phpversion = phpversion();
        if (version_compare($phpversion, $required, '<'))
        {
            throw new XenForo_Exception("PHP {$required} or newer is required. {$phpversion} does not meet this requirement. Please ask your host to upgrade PHP", true);
        }
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
