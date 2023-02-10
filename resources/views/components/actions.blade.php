@if (!isset($actions) || in_array('view',$actions))
    <a title="View" href="{{$url}}" class="btn btn-success"><span class="fa fa-eye"></span></a>
@endif
@if (!isset($actions) || in_array('edit',$actions))
    <a  title="Edit" href="{{$url}}/edit" class="btn btn-primary"><span class="fa fa-pen"></span></a>
@endif
@if (!isset($actions) || in_array('delete',$actions))
    <form  title="Delete"  class="form__action__delete" onclick="return confirm('Are you sure?')" action="{{$url}}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">
            <em class="fa fa-trash"></em>
        </button>
    </form>
@endif
