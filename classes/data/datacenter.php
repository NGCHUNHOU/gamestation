<?php
namespace classes\data;
class datacenter
{
    public $dbloginset = array("localhost", "gamestation", "root", "");
    public $defaulthead1;
    public $defaulthead2;
    public $metatitle = array("GameStation | Biggest Gaming Forum and Gaming News", "GameStation | About Us", "GameStation | News", "GameStation | About Us", "GameStation | Guides", "GameStation | Not Found");
    public $pathList;
    public $extraPages = array();
    public $pageList;
    public $pathListSlash = array();
    public $guidepage = array("Recommended For You","guide page coming soon");
    public $guideCardTitle = array();
    public $guideCardDesciption = array();
    public $guideCardContent = array();
    public $guideImage = array();
    public $guideSize;
    public $days = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday");
    public $articleDaySet = array(array(), array(array()));
}