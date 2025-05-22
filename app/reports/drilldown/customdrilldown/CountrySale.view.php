<?php
    $drilldown = $this->params["@drilldown"];
?>
<meta name="csrf-token" content="<?php echo csrf_token(); ?>" />
<level-title>All countries</level-title>
<?php
    \koolreport\widgets\google\GeoChart::create(array(
        "dataSource"=>$this->dataStore("country_sale"),
        "columns"=>array("country","sale_amount"=>array(
            "label"=>"Sales(USD)",
            "prefix"=>'$',
        )),
        "clientEvents"=>array(
            "rowSelect"=>"function(params){
                $drilldown.next({country:params.selectedRow[0]});
            }",
        ),
        "width"=>"100%",
    ));
?>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>