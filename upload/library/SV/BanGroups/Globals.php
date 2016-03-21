<?php

// This class is used to encapsulate global state between layers without using $GLOBAL[] or
// relying on the consumer being loaded correctly by the dynamic class autoloader
class SV_BanGroups_Globals
{
    public static $isSpamCleaningBan = false;

    private function __construct() {}
}
