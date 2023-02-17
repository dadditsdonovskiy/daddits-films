<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("#firstname, #lastname, #filmsCount").keypress(function (e) {
            if (e.which == 13) {
                $('form#directors-form').submit();
                return false;    //<---- Add this line
            }
        });
    });
</script>
