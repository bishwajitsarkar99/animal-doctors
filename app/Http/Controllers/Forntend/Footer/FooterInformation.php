<?php

namespace App\Http\Controllers\Forntend\Footer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forntend\Fornt_end_footer_informations_page;

class FooterInformation extends Controller
{
    public function index(){
        return view('super-admin.forntend.footer.footer_information');
    }
}
