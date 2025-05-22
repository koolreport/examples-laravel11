<?php



//Step 2: Creating Report class
class MyReport extends \koolreport\KoolReport
{
    use \koolreport\laravel\Friendship;
    function settings()
    {
        $config = include __DIR__ . "/../../../config.php";

        return array(
            "dataSources"=>$config
        );
    }
    protected function setup()
    {

    }
}