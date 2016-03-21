<?php

class SV_BanGroups_Listener
{
    const AddonNameSpace = 'SV_BanGroups_';

    public static function load_class($class, array &$extend)
    {
        $extend[] = self::AddonNameSpace.$class;
    }
}