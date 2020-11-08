<?php
namespace classes\pages;
require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/index.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/gamestation/env.php';

class newsData extends index
{
    public function __construct()
    {
        $this->updateTableData();
        $this->assignDayTable();
        $this->urlPath = $_SERVER["REQUEST_URI"];
        $this->addMetaList();
    }
}

$newsData = new newsData();

// if(isset($_GET['day']) && $_GET['day'] == 'tuesday')
// {
//     $JSON_newsData = json_encode($newsData->tuesday_list);
//     print_r($JSON_newsData);
// }

if (isset($_GET['day'])) {
switch ($_GET['day']) {
    case 'monday':
        $JSON_newsData = json_encode($newsData->monday_list);
        print_r($JSON_newsData);
        break;
    
    case 'tuesday':
        $JSON_newsData = json_encode($newsData->tuesday_list);
        print_r($JSON_newsData);
        break;
}
}
