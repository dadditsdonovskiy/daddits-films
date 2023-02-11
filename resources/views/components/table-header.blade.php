<?php
/**
 * @var $columns array
 */
?>
<thead>
<tr>
    @foreach($columns as $column)
    <th scope="col" width="{{$column['width']}}">{{$column['title']}}</th>
    @endforeach
</tr>
<tr class="filters">
    @foreach($columns as $column)
        <th width="{{$column['width']}}">
            <input type="text"
                   name="{{$column['name']}}"
                   class="form-control"
                   placeholder="{{$column['placeholder']}}"
            >
        </th>
    @endforeach
</tr>
</thead>
