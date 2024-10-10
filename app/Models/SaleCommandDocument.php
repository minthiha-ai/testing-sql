<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleCommandDocument extends Model
{
    use HasFactory;

    protected $table = 'sale_command_document';
    protected $primaryKey = 'sale_command_document_id';
    public $timestamps = true;

    protected $fillable = [
        'sale_command_document_datenow',
        'sale_command_document_no',
        'sale_command_status_id',
        'create_empcode',
        'edit_date',
        'computer_name',
        'customer_name',
        'customer_code',
        'customer_gender',
        'customer_address',
        'total_amount',
        'discount_amount',
        'net_amount',
        'customer_age',
        'sale_command_document_active',
        'branch_code',
        'vat_amount',
        'vat_base_amount',
        'gbh_customer_id',
        'sale_command_status_name',
        'sale_command_document_balance_amount',
        'sale_command_document_comment',
        'fix_address_sale_code',
        'edit_emplcode',
        'sale_command_type_id'
    ];

    // Relation to SaleCommandItem
    public function items()
    {
        return $this->hasMany(SaleCommandItem::class, 'sale_command_document_id');
    }
}
