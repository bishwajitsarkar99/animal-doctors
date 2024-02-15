<?php

namespace App\Models\Forntend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ForntEndFooter extends Model
{
    

    use HasFactory;

    protected $tabale = "fornt_end_footers";

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
        'linkedin',
        'youtube_chenel',
        'facebook_link',
        'messaner_link',
        'whatsapp_link',
        'linkedin_link' 
    ];
}
