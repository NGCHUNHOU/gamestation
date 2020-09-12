<?php
namespace classes\dataStorage\tableData;
use classes\db;
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamestation/classes/db/db.php';

class tableData  
{
    protected $ListTable = array();
    
    protected function __construct()
    {
        ;
    }

    /**
     * Grab data from mysql server with PDO 
     * @return tableData based on day arg
     */
    protected function getUpdateTableData($day) {
        $db = new db\db();
        $output = $db->query("SELECT updatenews.news_title, daytable.day FROM updatenews JOIN daytable ON updatenews.day_id = daytable.day_id WHERE daytable.day = ?", array($day));
        return $output;
    }

    /**
     * Store data into class properties
     * @return void
     */
    protected function updateTableData() {
        $this->ListTable = array('monday' => $this->getUpdateTableData('monday'),
                                 'tuesday' => $this->getUpdateTableData('tuesday')
                                    );

        print("<pre style='color: #fff;'>");
        print_r($this->ListTable);
        print('</pre>');
    }
}
