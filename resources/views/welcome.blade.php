@extends('app')

@section('content')
<button><a href="{{ route('sale-command-documents.index') }}">sale-command-documents</a></button>
<button><a href="{{ route('sale-command-items.index') }}">sale-command-items</a></button>
@endsection
