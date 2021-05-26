<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DataController extends Controller
{
    
	public function data_show()
	{

		$data=DB::table('data_entries')->get();

		return response()->json($data);


	}
	public function data_show_individual($id)
	{

		$data=DB::table('data_entries')
		->where('id',$id)
		->first();


		return response()->json($data);


	}
	public function data_insert(Request $req)
	{

		//For validation it is needed
		$validated = $req->validate([
        'data1' => 'required|unique:data_entries|max:255',
        'data2' => 'required',
    	]);

		$data=array();

		$data['data1']=$req->data1;
		$data['data2']=$req->data2;

		$inserted=DB::table('data_entries')
		->Insert($data);

		if($inserted)
		{

			return response('inserted successfully');

		}
		else
		{
			return response('not inserted');

		}

	}
	public function data_update(Request $req,$id)
	{

		$data=array();
		$data['data2']=$req->data2;

		$update=DB::table('data_entries')
		->where('id',$id)
		->update($data);

		if($update)
		{

			return response('update successfully');

		}
		else
		{
			return response('not updated');

		}


	}
	public function data_delete($id)
	{

		$delete=DB::table('data_entries')
		->where('id',$id)
		->delete();

		if($delete)
		{

			return response('delete successfully');

		}
		else
		{
			return response('not deleted');

		}


	}

}
