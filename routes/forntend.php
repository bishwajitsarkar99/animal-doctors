<?php
use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Forntend\Footer\FooterInformation;
use App\Http\Controllers\Forntend\Footer\Newsletter\NewsletterController;

Route::group(['middleware' => 'auth'], function (){
    
    // Fornt-End Page(Footer)
    Route::middleware('isSuperAdmin')->group(function() {
        // Footer
        Route::get('super-admin/forntend-footer-information', [FooterInformation::class, 'index'])->name('forntend_footer.index');
        Route::get('super-admin/forntend-footer-get-information', [FooterInformation::class, 'get_information'])->name('get_information.action');
        Route::post('super-admin/forntend-footer-update-information', [FooterInformation::class, 'update'])->name('update.action');
        // New Letter
        Route::get('super-admin/forntend-footer-newletter', [NewsletterController::class, 'index'])->name('forntend_footer_newletter.index');
        Route::get('super-admin/forntend-footer-get-newletter', [NewsletterController::class, 'get_newsletter'])->name('forntend_footer_get_newsletter.action');
        Route::get('super-admin/forntend-footer-filter-newletter', [NewsletterController::class, 'filter_newsletter'])->name('newsletter_filter.action');
        Route::delete('super-admin/forntend-footer-newletter/{id}', [NewsletterController::class, 'deletenewsletter'])->name('forntend_footer_newletter_delete.action');
        Route::get('super-admin/forntend-footer-newletter-pdf', [NewsletterController::class, 'pdf_newsletter'])->name('forntend_footer_newletter_pdf.action');
        Route::get('super-admin/forntend-footer-newletter/export-excel', [NewsletterController::class, 'export'])->name('forntend_footer_newletter_excel.action');
        Route::get('super-admin/fontend-footer-newsletter/export-cvs-format', [NewsletterController::class, 'exportCsv'])->name('forntend_footer_newletter_cvs_file.action');
    });
});