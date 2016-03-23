<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\VendaRequest;
use App\Venda;

class VendasController extends Controller
{
    public function index()
    {
      $vendas = Venda::all();
      return view('vendas.index', compact('vendas'));
    }
    
    public function create()
    {
      $venda = new Venda;
      return view('vendas.create', compact('venda'));
    }
    
    public function import()
    {
      return view('vendas.import');
    }
    
    public function processImport(Request $request)
    {
      $totalReceita = 0;
      
      $file = $request->file('file');
      $handle = fopen($file, 'r');
      $isFirstLine = true;
      while ( ($data = fgetcsv($handle, 1000, "\t") ) !== false ) {
        if(!$isFirstLine){
          $venda = new Venda();
          $venda->purchaser_name = $data[0];
          $venda->description = $data[1];
          $venda->price = $data[2];
          $venda->count = $data[3];
          $venda->merchant_address = $data[4];
          $venda->merchant_name = $data[5];
          
          //Salvar venda
          $venda->save();
          
          //Somar totalReceita
          $totalReceita += $venda->price * $venda->count;
        }
        $isFirstLine = false;
      }
      
      session()->flash('flash_message', 'Importação realizada com sucesso! Receita Bruta total da importação: ' . number_format($totalReceita, 2));
      return redirect('vendas');
    }
    
    public function store(VendaRequest $request)
    {
      Venda::create($request->all());
      session()->flash('flash_message', 'Venda salva com sucesso!');
      return redirect('vendas');
    }
    
    public function show(Venda $venda)
    {
      return view('vendas.show', compact('venda'));
    }
    
    public function edit(Venda $venda)
    {
      return view('vendas.edit', compact('venda'));
    }
    
    public function update(VendaRequest $request, Venda $venda)
    {
      $venda->update($request->all());
      return redirect('vendas');
    }
    
    public function destroy(Venda $venda)
    {
      $venda->delete();
      return redirect('vendas');
    }
    
}
