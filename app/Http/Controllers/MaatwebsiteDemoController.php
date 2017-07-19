<?php
namespace LilyFlower\Http\Controllers;

use Input;
use Illuminate\Http\Request;
use LilyFlower\photodetail;
use LilyFlower\address;
use LilyFlower\process;
use LilyFlower\pest;
use LilyFlower\disease;
use LilyFlower\User;
use Auth;
use DB;
use Excel;
use Storage;

class MaatwebsiteDemoController extends Controller
{
	public function importExport()
	{
		return view('importExport');
	}
	public function downloadExcel($type)
	{
		//$data = photodetail::get(array('process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water'))->toArray();
		//$data = photodetail::get(array('process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water'))->toArray();
		$dataCell = DB::table('photodetails') ->join('users', 'users.id', '=', 'photodetails.user_id')->join('processes', 'processes.id', '=', 'photodetails.process_id')->select('users.name','users.email','photodetails.water','processes.method', 'photodetails.L_value', 'photodetails.a_value', 'photodetails.b_value','photodetails.h','photodetails.s','photodetails.v','photodetails.take_time')->get();
		$data = collect($dataCell)->map(function($x){ return (array) $x; })->toArray();
		//echo $data;
		$filePath = iconv('UTF-8', 'big5', '農戶資料');
		$t=Excel::create($filePath, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data, null, 'A1', true,false);
	        });
		})->store($type, storage_path('public'))->download($type);
		
		// return Excel::create('lilyflower', function($excel) use ($data) {
		// 	$excel->sheet('mySheet', function($sheet) use ($data)
	 //        {
		// 		$sheet->fromArray($data);
	 //        });
		// })->download($type);
	}
	public function importExcel()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['title' => $value->title, 'description' => $value->description];
				}
				if(!empty($insert)){
					DB::table('photodetails')->insert($insert);
					dd('Insert Record successfully.');
				}
			}
		}
		return back();
	}
}
?>