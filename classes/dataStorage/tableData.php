<?php
namespace classes\dataStorage\tableData;
use classes\db;
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamestation/classes/db/db.php';

class tableData  
{
    protected $ListTable = array();
    protected $MonTitleURL = array();
    protected $TueTitleURL = array();
    protected $WedTitleURL = array();
    protected $ThurTitleURL = array();
    protected $FriTitleURL = array();
    protected $SatTitleURL = array();
    protected $SunTitleURL = array();
    
    protected function __construct()
    {
        $this->updateTableData();
    }

    /**
     * Grab data from mysql server with PDO 
     * @return tableData based on day arg
     */
    protected function getUpdateTableData($day) {
        $db = new db\db();
        $output = $db->query("SELECT updatenews.news_title, updatenews.description, updatenews.imgNews_thumbnail, updatenews.imgNews_content, updatenews.date, daytable.day FROM updatenews JOIN daytable ON updatenews.day_id = daytable.day_id WHERE daytable.day = ?", array($day));
        return $output;
    }

    /**
     * Store data into class properties
     * @return void
     */
    protected function updateTableData() {
        $this->ListTable = array('monday' => $this->getUpdateTableData('monday'),
                                 'tuesday' => $this->getUpdateTableData('tuesday'),
                                 'wednesday' => $this->getUpdateTableData('wednesday'),
                                 'thursday' => $this->getUpdateTableData('thursday'),
                                 'friday' => $this->getUpdateTableData('friday'),
                                 'saturday' => $this->getUpdateTableData('saturday'),
                                 'sunday' => $this->getUpdateTableData('sunday')
                                    );
       for ($i = 0; $i < count($this->ListTable['monday']); $i++) 
       {
        //    $this->ListTitleURL = array(
        //        'monday' => $this->ListTable['monday'][$i]['new_title']
        //    );
           array_push($this->MonTitleURL, array($this->ListTable['monday'][$i]['news_title']));
       }
       for ($i = 0; $i < count($this->ListTable['tuesday']); $i++) 
       {
           array_push($this->TueTitleURL, array($this->ListTable['tuesday'][$i]['news_title']));
       }
       for ($i = 0; $i < count($this->ListTable['wednesday']); $i++) 
       {
           array_push($this->WedTitleURL, array($this->ListTable['wednesday'][$i]['news_title']));
       }
       for ($i = 0; $i < count($this->ListTable['thursday']); $i++) 
       {
           array_push($this->ThurTitleURL, array($this->ListTable['thursday'][$i]['news_title']));
       }
       for ($i = 0; $i < count($this->ListTable['saturday']); $i++) 
       {
           array_push($this->FriTitleURL, array($this->ListTable['saturday'][$i]['news_title']));
       }
       for ($i = 0; $i < count($this->ListTable['sunday']); $i++) 
       {
           array_push($this->SunTitleURL, array($this->ListTable['sunday'][$i]['news_title']));
       }
    }

    /**
     * Replace empty space between the title words
     * @return $titleURL2 
     */
    public function rewriteNewsTitleUrl($title) {
        $search = array(
            " ",
            ":",
            "_"
        );
        $titleURL = str_replace($search[0], "-", $title);
        for ($i = 1; $i < count($search); $i++)
        {
           $titleURL2 = str_replace($search[$i], "", $titleURL);
           return $titleURL2;
        }
    }
}
