@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Haradin Asghedom items</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Maak een nieuwe post</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('Gelukt!'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nummer</th>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th width="280px">Actie</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">bekijk</a>

                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Bewerk</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Weg</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection
