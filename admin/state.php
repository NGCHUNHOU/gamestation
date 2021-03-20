<?php
class state 
{
    public $state;
    public function __construct($state)
    {
        $this->state = $state;
          $file = fopen("pages.json", "w");
          $data = json_encode(array("pageName"=> "pages.php", "htmlData" => "hello world", "state" => $this->state));
          fwrite($file, $data);
    }
}

if (isset($_POST["state"]))
{
    $state = new state($_POST["state"]);
}
