<?php
//dd($message);
?>
@foreach($columns as $column)
    <th style="{{$column['styles']}}">@sortablelink($column['name'])
        {{Form::text($column['name'],request($column['name']),[
            'id'=>$column['id'] ,
            'name'=>$column['name'] ,
            'placeholder'=>$column['placeholder'],
            'class'=>$column['class'],
        ])}}
        @error($column['name'])
        <div class="invalid-feedback" style="display: inline">
            {{$message}}
        </div>
        @enderror
    </th>
@endforeach
<th width="10%">Action Columns</th>
