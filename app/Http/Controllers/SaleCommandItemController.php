<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleCommandItem;
use App\Models\SaleCommandDocument;

class SaleCommandItemController extends Controller
{
    public function index()
    {
        $items = SaleCommandItem::with('document')->get();
        return view('sale_command_items.index', compact('items'));
    }

    public function create()
    {
        $documents = SaleCommandDocument::all();
        return view('sale_command_items.create', compact('documents'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sale_command_item_datenow' => 'required|date',
            'sale_command_item_active' => 'required|boolean',
            'sale_command_item_listno' => 'required|integer',
            'sale_command_document_id' => 'required|integer',
            'sale_command_document_no' => 'required|string',
            'product_id' => 'required|integer',
            'product_code' => 'required|string',
            'barcode_code' => 'required|string',
            'barcode_bill_name' => 'required|string',
            'unit_code' => 'required|string',
            'product_price1' => 'required|numeric',
            'price_sale' => 'required|numeric',
            'price_sale_amount' => 'required|numeric',
            'sale_amount' => 'required|integer',
            'sale_command_item_controldate' => 'required|date',
            'vat_type' => 'required|boolean',
            'vat_amount' => 'required|numeric',
            'diposit_type_id' => 'required|integer',
        ]);

        // Create the item record
        SaleCommandItem::create($validatedData);

        return redirect()->route('sale-command-items.index')->with('success', 'Item created successfully.');
    }

    public function show($id)
    {
        $item = SaleCommandItem::with('document')->findOrFail($id);
        return view('sale_command_items.show', compact('item'));
    }

    public function edit($id)
    {
        $item = SaleCommandItem::findOrFail($id);
        $documents = SaleCommandDocument::all();
        return view('sale_command_items.edit', compact('item', 'documents'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sale_command_document_id' => 'required',
            'product_code' => 'required',
            'sale_amount' => 'required|numeric',
            'price_sale' => 'required|numeric'
        ]);

        $item = SaleCommandItem::findOrFail($id);
        $item->update($validatedData);
        return redirect()->route('sale-command-items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $item = SaleCommandItem::findOrFail($id);
        $item->delete();
        return redirect()->route('sale-command-items.index')->with('success', 'Item deleted successfully.');
    }
}
