<?php

namespace App\Http\Controllers;

class Home extends Controller
{
    public function index()
    {
        $public_path = public_path();
        // echo "public_path=$public_path<br>";
        // exit;
		include $public_path . "/index_reports.php";
    }

    public function customReport()
	{
        // echo url("/"); echo "<br>";
        // echo url()->current(); echo "<br>";
        // echo base_path(); echo "<br>";
        // echo app_path(); echo "<br>";
        // exit;
		$report = new \App\reports\MyReport();
		$report_content = $report->run()->render(true);
		// echo $report_content;
		// return;
		// return $report_content;
		return view("customReport", ["report_content" => $report_content]);
	}

    public function report()
	{
        $base_url = url("/");
        $url = url()->current();
        $report_path = str_replace($base_url, app_path(), $url) . "/";
        // echo "report_path=$report_path"; exit;
		ob_start();
		include $report_path . "run.php";
		$report_content = ob_get_clean();
		return view("report", ["report_content" => $report_content]);
	}

    public function export()
	{
        $base_url = url("/");
        $url = url()->current();
        $report_path = str_replace($base_url, app_path(), $url);
		$report_path = rtrim($report_path, "/");
		$report_path = substr($report_path, 0, strrpos($report_path, "/")) . "/";
        // echo "report_path=$report_path<br>";
		if (file_exists($report_path . "export.php")) {
            // echo "has export.php<br>";
			include $report_path . "export.php";
		} else if (file_exists($report_path . "exportPDF.php")) {
            // echo "has exportPDF.php<br>";
			include $report_path . "exportPDF.php";
		} else if (file_exists($report_path . "exportExcel.php")) {
            // echo "has exportExcel.php<br>";
			include $report_path . "exportExcel.php";
		};
	}

    public function exportPDF()
	{
        $base_url = url("/");
        $url = url()->current();
        $report_path = str_replace($base_url, app_path(), $url);
		$report_path = rtrim($report_path, "/");
		$report_path = substr($report_path, 0, strrpos($report_path, "/")) . "/";
        // echo "report_path=$report_path<br>"; 
		if (file_exists($report_path . "exportPDF.php")) {
            // echo "has exportPDF.php<br>";
			include $report_path . "exportPDF.php";
		}
	}

    public function exportExcel()
	{
        $base_url = url("/");
        $url = url()->current();
        $report_path = str_replace($base_url, app_path(), $url);
		$report_path = rtrim($report_path, "/");
		$report_path = substr($report_path, 0, strrpos($report_path, "/")) . "/";
        // echo "report_path=$report_path<br>"; 
		if (file_exists($report_path . "exportExcel.php")) {
            // echo "has exportExcel.php<br>";
			include $report_path . "exportExcel.php";
		}
	}

}