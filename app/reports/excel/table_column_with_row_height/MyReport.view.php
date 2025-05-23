<?php
use \koolreport\datagrid\DataTables;
?>
<div class="report-content">
	<div style='text-align: center;margin-bottom:30px;'>
        <h1>Excel Exporting Table Column Width and Row Height</h1>
        <p class="lead">Exporting excel table with column width and row height</p>
		<form method="post">
			<?php echo csrf_field(); ?>
			<button type="submit" class="btn btn-primary" formaction="<?php echo url()->current(); ?>/export?type=excel">Download Excel</button>
		</form>
	</div>
	<div class='box-container'>
		<div>
			<?php
			DataTables::create(array(
				"dataSource" => $this->dataStore('orders'),
				"columns"=>array(
					"productName",
					"dollar_sales"=>array(
						"type"=>"number",
						"width" => "200px",
					),
				),
				"options" => [
					"ordering" => false,
				],
				"cssStyle" => [
					"tr" => function($row, $colMetas, $rowIndex) {
						return "height: " . (20 * ($rowIndex + 1)) . "px;";
					},
				],
			));
			?>
		</div>
	</div>
</div>
