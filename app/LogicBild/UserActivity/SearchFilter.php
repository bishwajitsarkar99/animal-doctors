<?php
namespace App\LogicBild\UserActivity;
use Illuminate\Http\Exceptions\HttpResponseException;
use Closure;

class SearchFilter
{
    public function handle($query, Closure $next)
    {
        if ($queryTerm = request('query')) {
            $queryTerm = trim($queryTerm);
            // 1. Only whitespace
            if (request('query') !== $queryTerm) {
                $this->throwValidationError('Search query cannot start or end with whitespace.');
            }
            // 2. Empty input after trimming
            if ($queryTerm === '') {
                $this->throwValidationError('Search query cannot be empty.');
            }
            // 3. Only special characters
            if (preg_match('/^[^a-zA-Z0-9@.]+$/', $queryTerm)) {
                $this->throwValidationError('Search query must include at least one letter, number, or valid character.');
            }
            // 4. Ends with @ only (incomplete email)
            if (preg_match('/@$/', $queryTerm)) {
                $this->throwValidationError('Email cannot end with "@" — please complete the domain.');
            }

            // 5. Ends with "gmail" but not "gmail.com"
            if (preg_match('/@gmail$/', $queryTerm)) {
                $this->throwValidationError('Email ending with "gmail" is incomplete — expected ".com".');
            }

            // 6. Ends with "gmail." (e.g., "abul@gmail.") — invalid
            if (preg_match('/@gmail\.$/', $queryTerm)) {
                $this->throwValidationError('Email ending with "gmail." is incomplete — expected "com".');
            }

            // 7. Ends with "gmail.com." (extra dot)
            if (preg_match('/\.com\.$/', $queryTerm)) {
                $this->throwValidationError('Email cannot end with a trailing dot after ".com".');
            }

            // 8. Only ends with "com" (no "@gmail")
            if (!str_contains($queryTerm, '@') && str_ends_with($queryTerm, 'com')) {
                $this->throwValidationError('Incomplete email — did you mean something like "@gmail.com"?');
            }
            // 9. Mobile number check (must be 12 digits if numeric)
            if (preg_match('/^\d+$/', $queryTerm) && strlen($queryTerm) !== 12) {
                $this->throwValidationError('Mobile number must be exactly 12 digits.');
            }

            // Apply actual filtering
            $query->where(function ($q) use ($queryTerm) {
                $q->where('name', 'LIKE', "%{$queryTerm}%")
                    ->orWhere('email', 'LIKE', "%{$queryTerm}%")
                    ->orWhere('contract_number', 'LIKE', "%{$queryTerm}%")
                    ->orWhere('role', 'LIKE', "%{$queryTerm}%")
                    ->orWhere('user_id', 'LIKE', "%{$queryTerm}%");
            });
        }

        return $next($query);
    }

    protected function throwValidationError(string $message, string $code = 'invalid_query')
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => $message,
            'code' => $code,
        ], 422));
    }
}
