<script type="module">
    import { getTimeDifference } from '/module/module-min-js/helper-function-min.js';
    // Function to update verification time for each user
    const updateVerificationTimes = () => {
        @foreach($users as $user)
            @if($user->email_verified_at != null)
                const verificationTimeElem = document.getElementById('verificationTime_{{ $user->id }}');
                if (verificationTimeElem) {
                    const verificationDate = '{{ $user->email_verified_at }}';
                    verificationTimeElem.textContent = getTimeDifference(verificationDate);
                }
            @endif
        @endforeach
    };
    // Call the function on page load
    document.addEventListener('DOMContentLoaded', () => {
        updateVerificationTimes();
    });
</script>