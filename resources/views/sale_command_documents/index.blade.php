@extends('app')

@section('content')
<a href="{{ url('/') }}">back</a>
<h2>Sale Command Documents</h2>
    <a href="{{ route('sale-command-documents.create') }}">Create New Document</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Customer Name</th>
                <th>Total Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documents as $document)
                <tr>
                    <td>{{ $document->sale_command_document_no }}</td>
                    <td>{{ $document->customer_name }}</td>
                    <td>{{ $document->total_amount }}</td>
                    <td>
                        <a href="{{ route('sale-command-documents.show', $document->sale_command_document_id) }}">View</a>
                        <a href="{{ route('sale-command-documents.edit', $document->sale_command_document_id) }}">Edit</a>
                        <form action="{{ route('sale-command-documents.destroy', $document->sale_command_document_id) }}" method="POST">
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
