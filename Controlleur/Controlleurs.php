<?php

function AcceuilControlleur()
{
    echo ('dans mon acceuil');
    require('Vue/acceuil.php');
}

function BackControlleur()
{
    require('Vue/back.php');
}

function MissionControlleur()
{
    require('Vue/mission.php');
}

function DetailControlleur()
{
    require('Vue/details.php');
}
