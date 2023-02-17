<?php
/**
 * @var $nameToDelete string
 */
?>
@if (!isset($actions) || in_array('view',$actions))
    <a title="View" href="{{$url}}" class="btn btn-success">View</a>
@endif
@if (!isset($actions) || in_array('edit',$actions))
    <a title="Edit" href="{{$url}}/edit" class="btn btn-primary">Edit</a>
@endif
@if (!isset($actions) || in_array('delete',$actions))
    <form title="Delete" class="form__action__delete" style="display: inline-block" action="{{$url}}" method="post"
          data-name="<?=$nameToDelete?>">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
    </form>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        var name = form.data("name");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete ` + name + `?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

</script>
