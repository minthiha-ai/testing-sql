@extends('app')

@section('content')
<a href="{{ url('/') }}">back</a>
<h2>Sale Command Items</h2>
    <a href="{{ route('sale-command-items.create') }}">Create New Item</a>
    <table>
        <thead>
            <tr>
                <th>Product Code</th>
                <th>Sale Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->product_code }}</td>
                    <td>{{ $item->sale_amount }}</td>
                    <td>
                        <a href="{{ route('sale-command-items.show', $item->sale_command_item_id) }}">View</a>
                        <a href="{{ route('sale-command-items.edit', $item->sale_command_item_id) }}">Edit</a>
                        <form action="{{ route('sale-command-items.destroy', $item->sale_command_item_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
