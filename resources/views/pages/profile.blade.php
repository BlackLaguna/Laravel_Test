@extends('app')

@section('content')
    <br><br>
    <div class="page-hero d-flex align-items-center justify-content-center">
       <h2> {{App\Companie::all()->find($id)->name}}</h2>
    </div>
    <div class="container-fluid">
        <div class="row">
            @if(\Illuminate\Support\Facades\Auth::check()&&\Illuminate\Support\Facades\Auth::user()->id==$id)
            <div class="col-3">
                <form action="{{route('description')}}" method="post" id="description">
                    @csrf
                    <div class="form-group">
                        <label for="description"><h3>Описание</h3></label>
                        <textarea style="height: 250px" class="form-control" name="description" form="description" >{{App\Companie::all()->find($id)->description}}</textarea>
                        <button type="submit" class="btn btn-primary form-control">Добавить \ Изменить описание</button>
                    </div>
                </form>
            </div>
            @else
            <div class="col-3 page-hero d-flex align-items-center justify-content-center">
                <p>
                    @if(App\Companie::all()->find($id)->description!==null)
                    {{App\Companie::all()->find($id)->description}}
                    @else
                    <h2>Описание ещё не созданно</h2>
                    @endif
                </p>
            </div>
            @endif
            <div class="col-6 page-hero d-flex align-items-center justify-content-center">
                <div class="col-7 page-hero d-flex align-items-center justify-content-center" >
                @if(App\Companie::all()->find($id)->img_path)
                    <img src="{{asset('/storage/' . App\Companie::all()->find($id)->img_path )}}" alt="" class="img-fluid" >
                @else
                    <h1>Нету фото</h1>
                    @endif
                </div>
            </div>
                @if(\Illuminate\Support\Facades\Auth::check()&&\Illuminate\Support\Facades\Auth::user()->id==$id)
            <div class="col-3 page-hero d-flex align-items-center justify-content-center">
                <form action="{{route('img')}}" method="post" id="image" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="img" class="form-control-file" style="margin: 15px">
                        <button type="submit" class="btn btn-primary form-control">Добавить \ Изменить Картинку</button>
                    </div>
                </form>
                <a href="delete" style="position: absolute; top: 0; right: 5% ;"><button class="btn btn-danger">Удалить аккаунт</button></a>
            </div>
                    @endif
        </div>
    </div>
    @if(\Illuminate\Support\Facades\Auth::check()&&\Illuminate\Support\Facades\Auth::user()->id==$id)
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 d-flex align-items-center justify-content-center">

            </div>
            <div class="col-4 ">


            </div>
        </div>
    </div>

    <table class="table table-hover ">
        <thead>
        <tr>
            <th>Сотрудник</th>
            <th>Должность</th>
            <th>Зарплата</th>
        </tr>
        </thead>
        <tbody>
            @foreach(App\Companie::all()->find($id)->employee as $employee)
                <tr id="tr{{$employee->id}}">
                    <td><input id="name{{$employee->id}}" value="{{ $employee->name}}"><input id="surname{{$employee->id}}" value="{{$employee->surname}}"></td>
                    <td><select id="select{{$employee->id}}" class="select_class" data-id="{{$employee->id}}">

                            @foreach(App\Post::all() as $post)

                                <option data-id="{{$post->id}}" data-salary="{{$post->salary}}"
                                @if($post->id == $employee->postes->id)
                                selected
                                @endif
                                >{{$post->name}}</option>

                            @endforeach
                        </select>
                    </td>
                    <td id="salary{{$employee->id}}">{{$employee->postes->salary}}</td>
                    <td><button class="btn btn-primary save_employee" data-id="{{$employee->id}}">Сохранить</button>   <button class="btn btn-primary delete_employee" data-id="{{$employee->id}}">Удалить</button></td>
                </tr>
            @endforeach
            <tr>
                <td><input id='new_name' placeholder="Имя"><input id='new_surname' placeholder="Фамилия"></td>
                <td><select id="select_new">
                        @foreach(App\Post::all() as $post)
                                <option data-id="{{$post->id}}">{{$post->name}} - зарплата = {{$post->salary}}</option>
                        @endforeach
                    </select>
                </td>
                <td></td>
                <td><button class="btn btn-primary create_employee add_employee">Создать</button></td>
            </tr>
        </tbody>
    </table>
    @endif
@if(\Illuminate\Support\Facades\Auth::check())
<div class="conteiner d-flex align-items-center justify-content-center">

    <div class="comments">
        <h3 class="title-comments">Комментарии ({{$count}})</h3>
        <ul class="media-list" id="coment_list">
            @foreach($coments as $coment)
            <li class="media">
                <div class="media-body">
                    <div class="media-heading">
                        <div class="author">{{$coment->owner}}</div>
                        <div class="metadata">
                            <span class="date">{{$coment->created_at}}</span>
                        </div>
                    </div>
                    <div class="media-text text-justify">{{$coment->body}}</div>
                </div>
            </li>
            @endforeach
            <hr>
        </ul>
                <ul class="media-list">
            <li class="media d-inline">
                <textarea data-id='{{$id}}' id="body_coment" class="form-control" style="width: 100%; height: 150px"></textarea>
                <button id="new_coment" class="btn btn-primary" style="margin: 7px">Написать коментарий</button>
            </li>
        </ul>
    </div>
</div>
    @endif
@endsection