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
		$photodetails= DB::table('photodetails')->join('addresses', 'addresses.id', '=', 'photodetails.address_id') ->join('users', 'users.id', '=', 'photodetails.user_id')->join('processes', 'processes.id', '=', 'photodetails.process_id')->select('users.name as UName','users.email','photodetails.water','processes.method', 'photodetails.L_value', 'photodetails.a_value', 'photodetails.b_value','photodetails.h','photodetails.s','photodetails.v','photodetails.take_time','photodetails.photo_url','addresses.name as AName','photodetails.created_at')->get();
		return view('importExport',compact('photodetails'));
	}
	public function downloadExcel($type)
	{
		//$data = photodetail::get(array('process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water'))->toArray();
		//$data = photodetail::get(array('process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water'))->toArray();
		$dataCell = DB::table('photodetails')->join('addresses', 'addresses.id', '=', 'photodetails.address_id') ->join('users', 'users.id', '=', 'photodetails.user_id')->join('processes', 'processes.id', '=', 'photodetails.process_id')->select('users.name as UName','users.email','photodetails.water','processes.method', 'photodetails.L_value', 'photodetails.a_value', 'photodetails.b_value','photodetails.h','photodetails.s','photodetails.v','photodetails.take_time','addresses.name as AName','photodetails.created_at')->get();
		$data = collect($dataCell)->map(function($x){ return (array) $x; })->toArray();
		//echo $data;
		$filePath = iconv('UTF-8', 'big5', '農戶資料');
		$t=Excel::create($filePath, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data, null, 'A1', true,false);
				$sheet->prependRow(1, array(
				    '農戶名字', 'E-mail','含水量','製程方式','L值','a值','b值','h','s','v','取樣時間','農田地址','上傳時間'
				));
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