<?php
namespace classes\data;
class datacenter
{
    public $dbloginset = array("localhost", "gamestation", "root", "");
    public $metatitle = array("GameStation | Biggest Gaming Forum and Gaming News", "GameStation | About Us", "GameStation | News", "GameStation | Not Found");
    public $pathList;
    public $pageList;
    public $pathListSlash = array();
    public $guidepagemaintain = "guide page coming soon";
    public $days = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday");
    public $articleDaySet = array(array(), array(array()));
    public function __construct()
    {}
}