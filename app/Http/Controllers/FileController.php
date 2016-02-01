<?php

namespace App\Http\Controllers;

use Storage;
use File;
use App\Import;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function import(Request $request)
    {
    	$file = $request->file('arquivo');
		$extension = $file->getClientOriginalExtension();

		$import = new Import;
		$import->user_id = 1;
		$import->save();
		
		Storage::disk('local')->put($import->id.'.'.$extension,  File::get($file));

		$handle = fopen($file, "r");
		$firstTime = true;
		while (($line = fgetcsv($handle, 1000, "\t")) !== false) {
			if($firstTime)
				$firstTime = false;	
			else
			{
				$produto = new Product;
				$produto->import_id = $import->id;
				$produto->purchaser_name = $line[0];
				$produto->item_description = $line[1];
				$produto->item_price = floatval($line[2]);
				$produto->purchase_count = intval($line[3]);
				$produto->merchant_address = $line[4];
				$produto->merchant_name = $line[5];
				$produto->save();
			}
		}
		return view('index', ['imports' => Import::all()]);
    }

    public function index()
    {
    	return view('index', ['imports' => Import::all()]);
    }
}
