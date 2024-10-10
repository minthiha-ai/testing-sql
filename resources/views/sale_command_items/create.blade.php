@extends('app')

@section('content')
<a href="{{ route('sale-command-items.index') }}">back</a>
    <h2>Create New Sale Command Item</h2>
    <form action="{{ route('sale-command-items.store') }}" method="POST">
        @csrf

        <div>
            <label for="sale_command_item_datenow">Item Date Now</label>
            <input type="datetime-local" id="sale_command_item_datenow" name="sale_command_item_datenow" required>
        </div>

        <div>
            <label for="sale_command_item_active">Item Active</label>
            <select id="sale_command_item_active" name="sale_command_item_active" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div>
            <label for="sale_command_item_listno">List No</label>
            <input type="number" id="sale_command_item_listno" name="sale_command_item_listno" required>
        </div>

        <div>
            <label for="sale_command_document_id">Sale Command Document</label>
            <select id="sale_command_document_id" name="sale_command_document_id" required>
                @foreach ($documents as $document)
                    <option value="{{ $document->sale_command_document_id }}">{{ $document->sale_command_document_no }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="sale_command_document_no">Document No</label>
            <input type="text" id="sale_command_document_no" name="sale_command_document_no" required>
        </div>

        <div>
            <label for="product_id">Product ID</label>
            <input type="number" id="product_id" name="product_id" required>
        </div>

        <div>
            <label for="product_code">Product Code</label>
            <input type="text" id="product_code" name="product_code" required>
        </div>

        <div>
            <label for="barcode_code">Barcode Code</label>
            <input type="text" id="barcode_code" name="barcode_code" required>
        </div>

        <div>
            <label for="barcode_bill_name">Barcode Bill Name</label>
            <input type="text" id="barcode_bill_name" name="barcode_bill_name" required>
        </div>

        <div>
            <label for="unit_code">Unit Code</label>
            <input type="text" id="unit_code" name="unit_code" required>
        </div>

        <div>
            <label for="product_price1">Product Price</label>
            <input type="number" id="product_price1" name="product_price1" step="0.01" required>
        </div>

        <div>
            <label for="price_sale">Price Sale</label>
            <input type="number" id="price_sale" name="price_sale" step="0.01" required>
        </div>

        <div>
            <label for="price_sale_amount">Price Sale Amount</label>
            <input type="number" id="price_sale_amount" name="price_sale_amount" step="0.01" required>
        </div>

        <div>
            <label for="sale_amount">Sale Amount</label>
            <input type="number" id="sale_amount" name="sale_amount" required>
        </div>

        <div>
            <label for="sale_command_item_controldate">Control Date</label>
            <input type="datetime-local" id="sale_command_item_controldate" name="sale_command_item_controldate" required>
        </div>

        <div>
            <label for="vat_type">VAT Type</label>
            <select id="vat_type" name="vat_type" required>
                <option value="0">No VAT</option>
                <option value="1">With VAT</option>
            </select>
        </div>

        <div>
            <label for="vat_amount">VAT Amount</label>
            <input type="number" id="vat_amount" name="vat_amount" step="0.01" required>
        </div>

        <div>
            <label for="diposit_type_id">Deposit Type ID</label>
            <input type="number" id="diposit_type_id" name="diposit_type_id" required>
        </div>

        <div>
            <button type="submit">Save</button>
        </div>
    </form>

    <h3>Execute SQL Query</h3>
<form action="{{ route('execute-sql') }}" method="POST">
    @csrf
    <div>
        <label for="sql_query">Enter SQL Query</label>
        <textarea id="sql_query" name="sql_query" rows="6" required></textarea>
    </div>

    <div>
        <button type="submit">Execute Query</button>
    </div>
</form>
@endsection
