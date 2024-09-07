<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthPages extends Model
{
    use HasFactory;
    protected $table = 'auth_pages';
    protected $fillable =[
        'domain_name',
        'ip_name',
        'page_name',
        'page_route',
        'local_host_page_url',
        'domain_page_url',
        'status',
    ];
}
