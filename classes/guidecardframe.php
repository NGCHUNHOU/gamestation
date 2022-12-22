<?php
namespace classes;
use classes\data\datacenter;
use classes\pages\home;
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/pages/home.php';
class guidecardframe extends home
{
    public $cardtitle = array();
    public $carddescription =  array();
    public $cardcontent =  array();
    public $guideImg =  array();
    public $guideSum;
    public function __construct(datacenter $dc)
    {
     parent::__construct($dc);
     $this->cardtitle = $dc->guideCardTitle;
     $this->carddescription = $dc->guideCardDesciption;
     $this->cardcontent = $dc->guideCardContent;
     $this->guideImg = $dc->guideCardContent;
    }
    public function generateCardContent($dc)
    { 
        $guideNum = 0;
        for($i=0;$i<count($this->getGuideTableData($dc));$i++)
        {
            $guideNum += 1;
            array_push($this->cardtitle, $this->getGuideTableData($dc)[$i]["guide_title"]);
            array_push($this->carddescription, $this->getGuideTableData($dc)[$i]["description"]);
            array_push($this->cardcontent, $this->getGuideTableData($dc)[$i]["content"]);
            array_push($this->guideImg, $this->getGuideTableData($dc)[$i]["imgGuide"]);
        }
        $this->guideSum = $guideNum;
    }
}