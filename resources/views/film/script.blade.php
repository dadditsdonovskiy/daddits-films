<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
            allowClear: true
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#description, #title").keypress(function (e) {
            if (e.which == 13) {
                $('form#films-form').submit();
                return false;    //<---- Add this line
            }
        });
    });
</script>

