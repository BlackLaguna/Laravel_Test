@extends('app')

@section('content')
<div class="container">
<table class="table table-hover ">
    <thead>
    <tr>
        <th>Кампания</th>
        <th>Сотрудник</th>
        <th>Должность</th>
        <th>Зарплата</th>
    </tr>
    </thead>
    <tbody>
    @foreach(App\Companie::all() as $companie)
<tr>
    <td><a href="index/{{$companie->id}}"><h4>{{$companie->name}}</h4></a></td>
</tr>
    @foreach($companie->employee as $employee)
        <tr>
        <td></td>
       <td>{{ $employee->name}} {{$employee->surname}}</td>
       <td>{{$employee->postes->name}}</td>
       <td>{{$employee->postes->salary}}</td>
        </tr>

    @endforeach



    @endforeach
    </tbody>
</table>
</div>
@endsection