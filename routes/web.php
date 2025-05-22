<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Home ::class, 'index']);
Route::get('/customReport', [Home ::class, 'customReport']);
// // Route::get('/customReport', 'App\Http\Controllers\Home@customReport');

$public_path = public_path() . "/";
$menu = json_decode(file_get_contents($public_path . "reports.json"), true);
// echo "<pre>" . json_encode($menu, JSON_PRETTY_PRINT) . "</pre>";
foreach ($menu as $section_name => $section) {
	foreach ($section as $group_name => $group) {
		foreach ($group as $sname => $surl) {
			if (is_string($surl)) {
				$surl = rtrim($surl, "/");
				// echo "surl=$surl<br>"; 
				Route::get($surl, [Home ::class, 'report']);
				Route::post($surl, [Home ::class, 'report']);
				$surlExport = "$surl/export";
				Route::get($surlExport, [Home ::class, 'export']);
				Route::post($surlExport, [Home ::class, 'export']);
				$surlExportPDF = "$surl/exportPDF";
                Route::get($surlExportPDF, [Home ::class, 'exportPDF']);
				Route::post($surlExportPDF, [Home ::class, 'exportPDF']);
				$surlExportExcel = "$surl/exportExcel";
                Route::get($surlExportExcel, [Home ::class, 'exportExcel']);
				Route::post($surlExportExcel, [Home ::class, 'exportExcel']);
			} else {
				foreach ($surl as $tname => $turl) {
					$turl = rtrim($turl, "/");
					Route::get($turl, [Home ::class, 'report']);
					Route::post($turl, [Home ::class, 'report']);
					$turlExport = "$turl/export";
					Route::get($turlExport, [Home ::class, 'export']);
					Route::post($turlExport, [Home ::class, 'export']);
                    $turlExportPDF = "$turl/exportPDF";
                    Route::get($turlExportPDF, [Home ::class, 'exportPDF']);
                    Route::post($turlExportPDF, [Home ::class, 'exportPDF']);
                    $turlExportExcel = "$turl/exportExcel";
                    Route::get($turlExportExcel, [Home ::class, 'exportExcel']);
                    Route::post($turlExportExcel, [Home ::class, 'exportExcel']);
				}
			}
		}
	}
}