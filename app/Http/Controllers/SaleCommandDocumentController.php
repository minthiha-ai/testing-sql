<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleCommandDocument;
use App\Http\Controllers\Controller;

class SaleCommandDocumentController extends Controller
{
    public function index()
    {
        $documents = SaleCommandDocument::all();
        return view('sale_command_documents.index', compact('documents'));
    }

    public function create()
    {
        return view('sale_command_documents.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sale_command_document_no' => 'required|string',
            'sale_command_status_id' => 'required|integer',
            'create_empcode' => 'required|string',
            'computer_name' => 'required|string',
            'customer_name' => 'required|string',
            'customer_code' => 'required|string',
            'customer_gender' => 'required|string',
            'customer_address' => 'required|string',
            'total_amount' => 'required|numeric',
            'discount_amount' => 'nullable|numeric',
            'net_amount' => 'required|numeric',
            'customer_age' => 'nullable|integer',
            'sale_command_document_active' => 'required|boolean',
            'branch_code' => 'required|string',
            'vat_amount' => 'nullable|numeric',
            'vat_base_amount' => 'nullable|numeric',
            'gbh_customer_id' => 'nullable|integer',
            'sale_command_status_name' => 'required|string',
            'sale_command_document_balance_amount' => 'nullable|numeric',
            'sale_command_document_comment' => 'nullable|string',
            'fix_address_sale_code' => 'nullable|string',
            'edit_emplcode' => 'nullable|string',
            'sale_command_type_id' => 'required|integer',
        ]);

        // Add the current timestamp to datenow
        $validatedData['sale_command_document_datenow'] = now();

        // Create the record
        SaleCommandDocument::create($validatedData);

        return redirect()->route('sale-command-documents.index')->with('success', 'Document created successfully.');
    }

    public function show($id)
    {
        $document = SaleCommandDocument::findOrFail($id);
        return view('sale_command_documents.show', compact('document'));
    }

    public function edit($id)
    {
        $document = SaleCommandDocument::findOrFail($id);
        return view('sale_command_documents.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sale_command_document_no' => 'required',
            'customer_name' => 'required',
            'total_amount' => 'required|numeric',
            'net_amount' => 'required|numeric'
        ]);

        $document = SaleCommandDocument::findOrFail($id);
        $document->update($validatedData);
        return redirect()->route('sale-command-documents.index')->with('success', 'Document updated successfully.');
    }

    public function destroy($id)
    {
        $document = SaleCommandDocument::findOrFail($id);
        $document->delete();
        return redirect()->route('sale-command-documents.index')->with('success', 'Document deleted successfully.');
    }
}
