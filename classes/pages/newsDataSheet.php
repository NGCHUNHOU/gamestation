<?php
namespace classes\pages;
require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/index.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/gamestation/env.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/data/datacenter.php';
use classes\data\datacenter;
class newsData extends index
{
    public function __construct()
    {
        $this->updateTableData(new datacenter);
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
        $JSON_newsData = json_encode(array_slice($newsData->monday_list, 0, 5));
        print_r($JSON_newsData);
        break;
    
    case 'tuesday':
        $JSON_newsData = json_encode(array_slice($newsData->tuesday_list, 0, 5));
        print_r($JSON_newsData);
        break;

    case 'wednesday':
        $JSON_newsData = json_encode(array_slice($newsData->wednesday_list, 0, 5));
        print_r($JSON_newsData);
        break;

    case 'thursday':
        $JSON_newsData = json_encode(array_slice($newsData->thursday_list, 0, 5));
        print_r($JSON_newsData);
        break;
   case 'friday':
        $JSON_newsData = json_encode(array_slice($newsData->friday_list, 0, 5));
        print_r($JSON_newsData);
        break;
   case 'saturday':
        $JSON_newsData = json_encode(array_slice($newsData->saturday_list, 0, 5));
        print_r($JSON_newsData);
        break;

    case 'sunday':
        $JSON_newsData = json_encode($newsData->sunday_list);
        print_r($JSON_newsData);
        break;
}
}
