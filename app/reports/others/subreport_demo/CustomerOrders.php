<?php

require "CustomerSelecting.php";
require "ListOrders.php";

class CustomerOrders extends \koolreport\KoolReport
{
    use \koolreport\laravel\Friendship;
    use \koolreport\core\SubReport;

    function settings()
    {
        return array(
            "subReports"=>array(
                "customerselecting"=>CustomerSelecting::class,
                "listorders"=>ListOrders::class,
            )
        );
    }
}