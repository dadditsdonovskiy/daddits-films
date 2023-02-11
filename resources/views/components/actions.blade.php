@if (!isset($actions) || in_array('view',$actions))
    <a title="View" href="{{$url}}" class="btn btn-success">View</a>
@endif
@if (!isset($actions) || in_array('edit',$actions))
    <a  title="Edit" href="{{$url}}/edit" class="btn btn-primary">Edit</a>
@endif
@if (!isset($actions) || in_array('delete',$actions))
    <form  title="Delete"  class="form__action__delete"   style="display: inline-block" onclick="return confirm('Are you sure?')" action="{{$url}}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">
            Delete
        </button>
    </form>
@endif
