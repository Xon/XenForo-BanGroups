<?php

class SV_BanGroups_Deferred_InstallHelper extends XenForo_Deferred_Abstract
{
    public function execute(array $deferred, array $data, $targetRunTime, &$status)
    {
        $options = XenForo_Application::getOptions();
        $val = $options->addBanUserGroup;
        $options->set('sv_addBanUserGroupSpam', $val);
        $dw = XenForo_DataWriter::create('XenForo_DataWriter_Option', XenForo_DataWriter::ERROR_SILENT);
        if ($dw->setExistingData('sv_addBanUserGroupSpam'))
        {
            $dw->set('option_value', $val);
            $dw->save();
        }

        $options->set('sv_addBanUserGroupPerm', $val);
        $dw = XenForo_DataWriter::create('XenForo_DataWriter_Option', XenForo_DataWriter::ERROR_SILENT);
        if ($dw->setExistingData('sv_addBanUserGroupPerm'))
        {
            $dw->set('option_value', $val);
            $dw->save();
        }

        return false;
    }

    public function canCancel()
    {
        return false;
    }
}
