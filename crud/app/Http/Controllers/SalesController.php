<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Sales;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sales::all();
        
        return view('sales.index', ['sales' => $sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = new Sales();
        
        $sale->purc_name = $request->purc_name;
        $sale->item_desc = $request->item_desc;
        $sale->price = $request->price;
        $sale->purc_count = $request->purc_count;
        $sale->merc_addr = $request->merc_addr;
        $sale->merc_name = $request->merc_name;
        
        if($sale->save())
        {
        	return view('sales.action', ['success' => true, 'class' => 'alert-success', 'message' => 'Record created successfully!']);
        }
        else
        {
        	return view('sales.action', ['success' => false, 'class' => 'alert-danger', 'message' => 'Sorry we couldn\'t create your record, please try again :(']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sales::find($id);
        
        return view('sales.edit', ['sale' => $sale]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sale = Sales::find($request->id);
        
        $sale->purc_name = $request->purc_name;
        $sale->item_desc = $request->item_desc;
        $sale->price = $request->price;
        $sale->purc_count = $request->purc_count;
        $sale->merc_addr = $request->merc_addr;
        $sale->merc_name = $request->merc_name;
        
    	if($sale->save())
        {
        	return view('sales.action', ['success' => true, 'class' => 'alert-success', 'message' => 'Record updated successfully!']);
        }
        else
        {
        	return view('sales.action', ['success' => false, 'class' => 'alert-danger', 'message' => 'Sorry we couldn\'t update your record, please try again :(']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sales::find($id);
        
        if($sale->delete())
        {
        	return view('sales.action', ['success' => true, 'class' => 'alert-success', 'message' => 'Record deleted successfully!']);
        }
        else
        {
        	return view('sales.action', ['success' => false, 'msg' => 'We couldn\'t delete your record, please try again. :(']);
        }
    }
}
