@extends('sales.form')

@section('title', 'Edit')

@section('action', '/sales/' . $sale->id)

@section('method', 'put')
