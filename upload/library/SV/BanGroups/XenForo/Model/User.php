<?php

class SV_BanGroups_XenForo_Model_User extends XFCP_SV_BanGroups_XenForo_Model_User
{
    public function ban($userId, $endDate, $reason, $update = false, &$errorKey = null, array $viewingUser = null, $triggered = false)
    {
        $options = XenForo_Application::getOptions();
        $old = $options->addBanUserGroup;

        if (SV_BanGroups_Globals::$isSpamCleaningBan)
        {
            $options->set('addBanUserGroup', $options->sv_addBanUserGroupSpam);
        }
        else if ($endDate === self::PERMANENT_BAN)
        {
            $options->set('addBanUserGroup', $options->sv_addBanUserGroupPerm);
        }

        try
        {
            return parent::ban($userId, $endDate, $reason, $update, $errorKey, $viewingUser, $triggered);
        }
        finally
        {
            $options->set('addBanUserGroup', $old);
        }
    }
}