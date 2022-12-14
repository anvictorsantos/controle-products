@extends('layouts.main')
@include('components.modal')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.6 CRUD Example from scratch</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success mb-3" href="{{ route('product.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nº</th>
            <th>Nome</th>
            <th>Detalhes</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    {{-- <a class="btn btn-info" href="{{ route('product.show', $product->id) }}">Visualizar</a> --}}
                    <a href="javascript:void(0)" 
                       id="show-product" 
                       data-url="{{ route('product.show', $product->id) }}"
                       class="btn btn-info">
                        Visualizar
                    </a>
                    <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Editar</a>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection