@extends('app')

@section('content')
<a href="{{ route('sale-command-documents.index') }}">back</a>
<h2>Create New Sale Command Document</h2>
    <form action="{{ route('sale-command-documents.store') }}" method="POST">
        @csrf

        <div>
            <label for="sale_command_document_no">Document No</label>
            <input type="text" id="sale_command_document_no" name="sale_command_document_no" required>
        </div>

        <div>
            <label for="sale_command_status_id">Status ID</label>
            <input type="number" id="sale_command_status_id" name="sale_command_status_id" required>
        </div>

        <div>
            <label for="create_empcode">Employee Code</label>
            <input type="text" id="create_empcode" name="create_empcode" required>
        </div>

        <div>
            <label for="computer_name">Computer Name</label>
            <input type="text" id="computer_name" name="computer_name" required>
        </div>

        <div>
            <label for="customer_name">Customer Name</label>
            <input type="text" id="customer_name" name="customer_name" required>
        </div>

        <div>
            <label for="customer_code">Customer Code</label>
            <input type="text" id="customer_code" name="customer_code" required>
        </div>

        <div>
            <label for="customer_gender">Customer Gender</label>
            <select id="customer_gender" name="customer_gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div>
            <label for="customer_address">Customer Address</label>
            <textarea id="customer_address" name="customer_address" required></textarea>
        </div>

        <div>
            <label for="total_amount">Total Amount</label>
            <input type="number" id="total_amount" name="total_amount" step="0.01" required>
        </div>

        <div>
            <label for="discount_amount">Discount Amount</label>
            <input type="number" id="discount_amount" name="discount_amount" step="0.01">
        </div>

        <div>
            <label for="net_amount">Net Amount</label>
            <input type="number" id="net_amount" name="net_amount" step="0.01" required>
        </div>

        <div>
            <label for="customer_age">Customer Age</label>
            <input type="number" id="customer_age" name="customer_age">
        </div>

        <div>
            <label for="sale_command_document_active">Document Active</label>
            <select id="sale_command_document_active" name="sale_command_document_active">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div>
            <label for="branch_code">Branch Code</label>
            <input type="text" id="branch_code" name="branch_code" required>
        </div>

        <div>
            <label for="vat_amount">VAT Amount</label>
            <input type="number" id="vat_amount" name="vat_amount" step="0.01">
        </div>

        <div>
            <label for="vat_base_amount">VAT Base Amount</label>
            <input type="number" id="vat_base_amount" name="vat_base_amount" step="0.01">
        </div>

        <div>
            <label for="gbh_customer_id">GBH Customer ID</label>
            <input type="number" id="gbh_customer_id" name="gbh_customer_id">
        </div>

        <div>
            <label for="sale_command_status_name">Sale Command Status Name</label>
            <input type="text" id="sale_command_status_name" name="sale_command_status_name" required>
        </div>

        <div>
            <label for="sale_command_document_balance_amount">Balance Amount</label>
            <input type="number" id="sale_command_document_balance_amount" name="sale_command_document_balance_amount" step="0.01">
        </div>

        <div>
            <label for="sale_command_document_comment">Document Comment</label>
            <textarea id="sale_command_document_comment" name="sale_command_document_comment"></textarea>
        </div>

        <div>
            <label for="fix_address_sale_code">Fix Address Sale Code</label>
            <input type="text" id="fix_address_sale_code" name="fix_address_sale_code">
        </div>

        <div>
            <label for="edit_emplcode">Edit Employee Code</label>
            <input type="text" id="edit_emplcode" name="edit_emplcode">
        </div>

        <div>
            <label for="sale_command_type_id">Sale Command Type ID</label>
            <input type="number" id="sale_command_type_id" name="sale_command_type_id" required>
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
