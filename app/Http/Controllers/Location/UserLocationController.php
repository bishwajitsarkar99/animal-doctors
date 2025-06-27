<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\UserActivity\UserActivityServiceProvider;
use App\Services\PdfService;

class UserLocationController extends Controller
{
    protected $userActivityServiceProvider;

    // inject UserActivityServiceProvider
    public function __construct(UserActivityServiceProvider $userActivityServiceProvider)
    {
        return $this->userActivityServiceProvider = $userActivityServiceProvider;
    }

    // User Activity redirect for generate id
    public function redirectWithRandom()
    {
        return $this->userActivityServiceProvider->redirectWithRandomId();
    }

    // User Activity
    public function details(Request $request, $slug)
    {
        return $this->userActivityServiceProvider->viewUserDetails($request, $slug);
    }

    // Get User Activity
    public function getActivity(Request $request)
    {
        return $this->userActivityServiceProvider->getActivities($request);
    }

    // Show User Log Details
    public function activity(Request $request)
    {
        return $this->userActivityServiceProvider->activities($request);
    }

    // User Log Activity Analytical Chart
    public function userAnalyticalChart(Request $request)
    {
        return $this->userActivityServiceProvider->userAnalyticalCharts($request);
    }

    // Fetch Branch Data
    public function getBranch(Request $request)
    {
        return $this->userActivityServiceProvider->fetchBranchData($request);
    }

    // Fetch Role Data
    public function fetchRoleData(Request $request , $id)
    {
        return $this->userActivityServiceProvider->getFetchRoleData($request , $id);
    }

    // Fetch User Email Data
    public function fetchUserEmail(Request $request , $id)
    {
        return $this->userActivityServiceProvider->getFetchUserEmail($request , $id);
    }

    // PDF Download Session Data
    public function pdfDownloadSession(Request $request, PdfService $pdfService)
    {
        return $this->userActivityServiceProvider->pdfDownloadSessionData($request, $pdfService);
    }

    // Export Excel Download Session Data
    public function exportExcelDownloadSession(Request $request)
    {
        return $this->userActivityServiceProvider->exportExcelDownloadSessionData($request);
    }

    // Export Excel CVS Format Download Session Data
    public function exportExcelCsvDownloadSession(Request $request)
    {
        return $this->userActivityServiceProvider->exportExcelCsvDownloadSessionData($request);
    }

    // Print Session Data
    public function printSession(Request $request)
    {
        return $this->userActivityServiceProvider->printSessionData($request);
    }

    // PDF Download Single Session Data
    public function pdfDownloadUserLogged(Request $request, PdfService $pdfService)
    {
        return $this->userActivityServiceProvider->pdfDownloadUserLoggedData($request, $pdfService);
    }

    // Print Single Session Data
    public function printDownloadUserLogged(Request $request)
    {
        return $this->userActivityServiceProvider->printDownloadUserLoggedData($request);
    }
}
