<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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
    
    public function store(Request $request)
    {
      Venda::create($request->all());
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
      return view('vendas.index');
    }
}
