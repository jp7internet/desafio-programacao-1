<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Purchase;

class PurchaseController extends Controller {

    // receive an array of purchase date and save it in DB
    private function purchaseSave($data){
        
        list($purchaser_name,$item_description,$item_price,
           $purchase_count,$merchant_address,$merchant_name) = $data;

           $p = new Purchase;
           $p->purchaser_name = $purchaser_name;
           $p->item_description = $item_description;
           $p->item_price = floatval(str_replace("R$","", $item_price));
           $p->purchase_count = floatval($purchase_count);
           $p->merchant_address = $merchant_address;
           $p->merchant_name = $merchant_name;

           $p->save();
           // return a item price for sum in the end
           return $item_price;                                 
    }

    // get a file uploaded and parse it 
    public function parse()
    {
        $sum = 0;                                       // initialize sum with zero
        if (session()->has('filename')){

            $path = 'uploads/'.session('filename');     // retriave a path of uploaded file
            
            $myfile = fopen($path, "r") or die("Unable to open file!");
            $line = fgets($myfile);                     // rule the first line of file
            while(!feof($myfile)) {
               $line = fgets($myfile);                  // get the line
               $data = preg_split('[\t]', $line);       // split the line in the array
               if(count($data) > 1)                     // if array is valid call the save method
                    $sum += $this->purchaseSave($data);
            }
            fclose($myfile);                            // close the file
        }
        return view('upload', ['sum' => $sum]);         //return the page with sum value
    }

}