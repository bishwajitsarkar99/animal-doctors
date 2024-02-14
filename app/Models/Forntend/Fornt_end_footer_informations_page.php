<?php

namespace App\Models\Forntend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornt_end_footer_informations_page extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'company_address',
        'email',
        'contract_number_one',
        'contract_number_two',
        'hot_number',
        'whatsapp_number_one',
        'whatsapp_number_two',
        'facebook_address',
        'linkedin'
    ];
}
