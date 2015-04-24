<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Purchase;

class PurchaseController extends Controller {

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
           return $item_price;
    }

     public function parse()
    {
        $valor = 0;
        if (session()->has('data')){
            $a = session('data');
            $name = 'uploads/'.$a;

            
            $myfile = fopen($name, "r") or die("Unable to open file!");
            $line = fgets($myfile);
            while(!feof($myfile)) {
               $line = fgets($myfile);
               $data = preg_split('[\t]', $line);
               if(count($data) > 1) 
                    $valor += $this->purchaseSave($data);

            }
          //  exit();
            fclose($myfile);
        }
        
        return view('upload', ['valor' => $valor]);
        //return redirect()->route('upload')->with('valor', $valor);
    }

}