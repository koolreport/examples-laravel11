<?php

class CustomerSelecting extends \koolreport\KoolReport
{
    use \koolreport\laravel\Friendship;
    use \koolreport\inputs\Bindable;
    use \koolreport\inputs\POSTBinding;

    protected function defaultParamValues()
    {
        return array(
            "country"=>null,
            "customer"=>null,
        );
    }
    protected function bindParamsToInputs()
    {
        return array(
            "country",
            "customer"
        );
    }
    
    
    function settings()
    {
        $config = include __DIR__ . "/../../../config.php";
        return array(
            "dataSources"=>array(
                "automaker"=>$config["automaker"],
            ),
        );
    }

    function setup()
    {
        $this->src("automaker")->query("
            SELECT country from customers GROUP BY country
        ")->pipe($this->dataStore("countries"));

        if($this->params["country"]!=null)
        {
            $this->src("automaker")->query("
                SELECT customerNumber, customerName from customers
                WHERE
                    country=:country
            ")
            ->params(array(
                ":country"=>$this->params["country"],
            ))
            ->pipe($this->dataStore("customers"));            
        }
    }
}