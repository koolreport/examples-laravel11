<?php
use \koolreport\widgets\koolphp\Table;
?>
<div class="report-content">
	<div style='text-align: center;margin-bottom:30px;'>
        <h1>Big Spreadsheet Exporting</h1>
        <p class="lead">Exporting big spreadsheet with template</p>
		<form method="post">
			<?php echo csrf_field(); ?>
			<button type="submit" class="btn btn-primary" formaction="<?php echo url()->current(); ?>/export?type=XLSX">Download XLSX</button>
			<button type="submit" class="btn btn-primary" formaction="<?php echo url()->current(); ?>/export?type=ODS">Download ODS</button>
			<button type="submit" class="btn btn-primary" formaction="<?php echo url()->current(); ?>/export?type=CSV">Download CSV</button>
		</form>
	</div>
	<div class='box-container'>
		<div>
			<?php
			Table::create(array(
				"dataSource" => $this->dataStore('sales'),
				"paging"=>array(
					"pageSize"=>5
				)
			));
			?>
		</div>
	</div>
</div>
