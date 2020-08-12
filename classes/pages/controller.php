<?php
namespace classes\pages;
use classes\db;

    class controller  {
        function createheader($page = '')
        {
            require_once($_SERVER['DOCUMENT_ROOT'].'/gamestation/view/header/'. $page .'.php');
        }
        function createfooter() {
            require_once($_SERVER['DOCUMENT_ROOT'].'/gamestation/view/footer.php');
        }

        public function __construct() {}

        public function get_siteinfo($metaname, $page_title)
        {
            $db = new db\db();
            $query = $db->query("SELECT s.metacontent, t.name, m.metaname FROM `siteinfo` AS `s` JOIN `titleinfo` AS `t` ON s.title_id = t.title_id JOIN `metainfo` AS `m` ON m.meta_id = s.meta_id WHERE m.metaname = :meta AND t.name = :page_title", array(':meta' => $metaname, ':page_title' => $page_title));
            if (isset($query)) {
            foreach ($query as $row) {
            return $row['metacontent'];
             }
            } else {
                return false;
            }
        }
        public function get_filepath($css_path, $page_name)
        {
            $db = new db\db();
            $query = $db->query("SELECT t.name, t.css_path FROM `titleinfo` AS `t` WHERE t.name = :page_name", array(':page_name' => $page_name));
            if (isset($query)) {
                foreach ($query as $val) {
                    return $val[$css_path];
                }
            } else {
                return false;
            }
        }

        public function includecdn($filename)
        {
            $filepath = $_SERVER['DOCUMENT_ROOT'].'/gamestation/view/cdn/'.$filename.'.php';
            if (file_exists($filepath)) {
                require_once $filepath;
            } else {
                return false;
            }
        }
    }
