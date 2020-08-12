<?php
namespace classes\loader;
use classes\pages;
use Exception;

class loader
{
    protected $ControllerPath = array();
    protected $RoutePath = '';
    protected $errorPageSrc;
    protected $viewList = array();

    function __construct()
    {
        // Load all the config class files
        new pages\controller(); new pages\view();

        // List of dynamic url path
        $url = $this->StoreUrlPath();

        $this->LibsLoader();

        $this->ViewLoader();
    }

    public function LibsLoader()
    {
        // load admin controller
        $dbconfig_filepath = $_SERVER['DOCUMENT_ROOT']. '/gamestation/admin/libs/config.php';
        if (file_exists($dbconfig_filepath)) {
            require_once($dbconfig_filepath);
        }

        // load admin signup page
        $admin_registerfile = $_SERVER['DOCUMENT_ROOT']. '/gamestation/admin/controller/register.php';
        if (file_exists($admin_registerfile)) {
            require_once($admin_registerfile);
        }
        return $file;
    }


    public function StoreUrlPath()
    {
        if (isset($this->RoutePath)) {
            $this->RoutePath = explode('/', isset($_GET['url']));
        } else {
            echo 'RoutePath is not defined';
        }
        return $this->RoutePath;
    }


    protected function generateErrorPage() {
           $this->errorPageSrc = $_SERVER['DOCUMENT_ROOT'] . '/gamestation/view/errorview/notfound.php';
           $viewLocation = $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages';
           // extract file name from files
            if (is_dir($viewLocation)) {
                $arrList = array_map(function ($arrVal)
                {
                    return str_replace(".php", "", $arrVal);
                }, scandir($viewLocation)) ; 
                $this->viewList = $arrList; 
            }
            else {
                throw new Exception('pages folder not found: ', 1);
            }
            if (is_array($this->viewList)) {
                unset($this->viewList[0]);
                unset($this->viewList[1]);
                $this->viewList = array_values($this->viewList);
            }
            else {
                throw new Exception("viewList is not set: ", 1);
            }            
          // End of file name extraction 
            foreach ($this->viewList as $viewList) {
                if (!isset($_GET['url'])) {
                    return false;
                }
                if ($viewList == $_GET['url']) {
                    return true;
                }
                else {
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/gamestation/view/errorview/notfound.php';
                }
            }
    }

    /**
     * @return bool
     */
    public function ViewLoader()
    {
        $file = 'controller/' . 'view' . '.php';
        if (file_exists(( $file )) and !isset($_GET['url'])) {
            $view = new pages\view();
            $view->createheader('home');
            $view->addview('home');
            $view->createfooter();
        } else {
            return false;
        }
    }
}




