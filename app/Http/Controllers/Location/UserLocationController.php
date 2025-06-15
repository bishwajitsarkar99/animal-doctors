<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\UserActivity\UserActivityServiceProvider;

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

    // Search User Log Session Data
    public function fetchLogSessionData(Request $request)
    {
        return $this->userActivityServiceProvider->getFetchLogSessionData($request);
    }
}
