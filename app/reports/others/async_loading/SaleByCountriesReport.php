<?php

class SaleByCountriesReport extends \koolreport\KoolReport
{
    use \koolreport\laravel\Friendship;
    public function settings()
    {
        $config = include __DIR__ . "/../../../config.php";

        return array(
            "dataSources"=>array(
                "automaker"=>$config["automaker"]
            )
        );
    }
}