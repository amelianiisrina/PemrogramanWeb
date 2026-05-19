@extends('layouts.app')

@section('title', 'Products')

@section('content')

<h2>Daftar Produk</h2>

<ul>
    @foreach ($products as $product)
    <li>{{ $product->name }} - 
        Rp {{ $product->price }}
    </li>
    @endforeach
    </ul>

@endsection
