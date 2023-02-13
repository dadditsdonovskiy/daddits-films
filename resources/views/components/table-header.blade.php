@foreach($columns as $column)
    <th style="{{$column['styles']}}">@sortablelink($column['name'])
        {{Form::text($column['name'],null,[
            'id'=>$column['id'] ,
            'name'=>$column['name'] ,
            'placeholder'=>$column['placeholder'],
            'class'=>$column['class'],
        ])}}
    </th>
@endforeach
