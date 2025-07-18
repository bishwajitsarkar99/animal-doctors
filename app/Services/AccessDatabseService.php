<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccessDatabaseService
{
    public static function hasAccess($connectionName, $tableName, $action = 'read')
    {
        $user = Auth::user();
        if (!$user) return false;

        $roleId = $user->role_id;

        // Resolve the target database
        $database = DB::table('databases')
            ->where('env_connection_key', $connectionName)
            ->first();

        if (!$database) return false;

        // Get the table inside that database
        $table = DB::table('tables')
            ->where('name', $tableName)
            ->where('database_id', $database->id)
            ->first();

        if (!$table) return false;

        // Sanitize action (only allow specific actions)
        $allowedActions = ['read', 'write', 'delete'];
        if (!in_array($action, $allowedActions)) {
            return false;
        }

        $canColumn = "can_{$action}";

        // Check user-level permission
        $userPerm = DB::table('user_table_permissions')
            ->where('user_id', $user->id)
            ->where('table_id', $table->id)
            ->first();

        if ($userPerm && isset($userPerm->$canColumn) && $userPerm->$canColumn) {
            return true;
        }

        // Check role-level permission
        $rolePerm = DB::table('role_table_permissions')
            ->where('role_id', $roleId)
            ->where('table_id', $table->id)
            ->first();

        return $rolePerm && isset($rolePerm->$canColumn) && $rolePerm->$canColumn;
    }
}

// This use Contorller
// public function index()
// {
// if (!AccessDatabaseService::hasAccess('DB_CONNECTION_third', 'products', 'read')) {
//     abort(403, 'Read Access Denied');
// }

// if (!AccessDatabaseService::hasAccess('DB_CONNECTION_third', 'products', 'write')) {
//     abort(403, 'Write Access Denied');
// }

// if (!AccessDatabaseService::hasAccess('DB_CONNECTION_third', 'products', 'delete')) {
//     abort(403, 'Delete Access Denied');
// }

//     $products = DB::connection('DB_CONNECTION_third')->table('products')->get();

//     return view('products.index', compact('products'));
// }