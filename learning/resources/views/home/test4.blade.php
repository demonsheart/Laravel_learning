id&emsp;&emsp;name&emsp;&emsp;age&emsp;&emsp;&emsp;email<br/>
@foreach ($data as $val)
    {{$val->id}}&emsp;&emsp;{{$val->name}}&emsp;&emsp;
    {{$val->age}}&emsp;&emsp;&emsp;{{$val->email}}<br/>
@endforeach
<hr/>
今天是星期
@if ($day == '1')
    一
@elseif($day == '2')
    二
@elseif($day == '3')
    三
@elseif($day == '4')
    四
@elseif($day == '5')
    五
@elseif($day == '6')
    六
@elseif($day == '7')
    日
@endif