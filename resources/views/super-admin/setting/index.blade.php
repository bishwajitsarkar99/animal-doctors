<html>


<head>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->

</head>

<body class="{{setting('set_attribute', '0')}}">


    <h1>I am bikso</h1>


    @foreach($settings as $key => $value)
    <div>
        <label>{{$key}}</label>
        <input type="text" name="{{$key}}" value="{{$value}}" />
    </div>
    @endforeach
    <label for="set_attribute">Select</label>
    <select name="set_attribute" id="set_attribute">
        <option value="slitem-table" @if(setting('set_attribute', '0' )=='0' ) {{'selected'}} @endif>Silim</option>
        <option value="zoom-table" @if(setting('set_attribute', '0' )=='1' ) {{'selected'}} @endif>fat</option>
    </select>

    <script>
        $(document).ready(function() {
            $("#set_attribute").on('change', function() {


                var settings = [];
                settings.push({
                    key: $(this).attr('name'),
                    value: $(this).val(),
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    }
                });

                var oldValue = $(this).data('oldValue'); // Get the old value from data attribute
                var newValue = $(this).val(); // Get the new value


                $.ajax({
                    type: "post",
                    url: '/settings?_method=PUT',
                    dataType: 'json',
                    data: {
                        settings
                    },
                    success: function(response) {

                        if ($('body').hasClass(oldValue)) {
                            $('body').removeClass(oldValue);
                        }

                        if ($('body').hasClass(newValue)) {
                            $('body').removeClass(newValue);
                        }

                        $('body').addClass(newValue);

                        // // Update the old value for the next change event
                        // $(this).data('oldValue', newValue);

                    }

                });

            });
        });
    </script>


</body>

</html>