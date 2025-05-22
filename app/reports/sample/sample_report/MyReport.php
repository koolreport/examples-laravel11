<?php



//Step 2: Creating Report class
class MyReport extends \koolreport\KoolReport
{
    use \koolreport\laravel\Friendship;
    protected function settings()
    {
        return array(
            "dataSources"=>array(
                
            )
        );
    }
    protected function setup()
    {

    }
}