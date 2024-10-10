<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleCommandItem extends Model
{
    use HasFactory;

    protected $table = 'sale_command_item';
    protected $primaryKey = 'sale_command_item_id';
    public $timestamps = true;

    protected $fillable = [
        'sale_command_item_datenow',
        'sale_command_item_active',
        'sale_command_item_listno',
        'sale_command_document_id',
        'sale_command_document_no',
        'product_id',
        'product_code',
        'barcode_code',
        'barcode_bill_name',
        'unit_code',
        'product_price1',
        'price_sale',
        'price_sale_amount',
        'sale_amount',
        'sale_command_item_controldate',
        'vat_type',
        'vat_amount',
        'diposit_type_id'
    ];

    // Relation to SaleCommandDocument
    public function document()
    {
        return $this->belongsTo(SaleCommandDocument::class, 'sale_command_document_id');
    }
}
