@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <!--<a class="btn btn-primary" href="{{route('todo.create')}}">Добавить</a>-->
                </nav>

                
                <div class="card">
                    <div class="card-body">

                        <form method="get" action="{{route('todo.index')}}">
                            @csrf
                            <div class="container">
                                <div class="row">
                                  <div class="col">
                                    <select class="form-control" name="category">
                                        @php
                                            echo Cookie::get('sort_direction');
                                        @endphp
                                        <option value="user_name_sort_ASC" @if ($sort_by=='user_name_sort_ASC') selected @endif>Сортировать по имени пользователя &#8593;</option>
                                        <option value="user_name_sort_DESC" @if ($sort_by=='user_name_sort_DESC') selected @endif>Сортировать по имени пользователя &#8595;</option>
                                        <option value="user_email_sort_ASC" @if ($sort_by=='user_email_sort_ASC') selected @endif>Сортировать по e-mail &#8593;</option>
                                        <option value="user_email_sort_DESC" @if ($sort_by=='user_email_sort_DESC') selected @endif>Сортировать по e-mail &#8595;</option>
                                        <option value="status_sort_ASC" @if ($sort_by=='status_sort_ASC') selected @endif>Сортировать по статусу задачи &#8593;</option>
                                        <option value="status_sort_DESC" @if ($sort_by=='status_sort_DESC') selected @endif>Сортировать по статусу задачи &#8595;</option>
                                        
                                       </select>
                                  </div>
                                  <div class="col">
                                    <button type="submit" class="btn btn-primary">Фильтровать</button>
                                  </div>
                                </div>
                             
                             
                            </form>
                            <br>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Для пользователя</th>
                                    <th>Почта пользователя</th>
                                    <th>Текст задачи</th>
                                    <th>Выполнена</th>
                                    <th>Действие</th>
                                    <th>Комментарий</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paginator as $item)
                                @php  @endphp
                                <form method="POST" action="{{ route('todo.update', $item->id) }}">
                                    @method('PATCH') <!--метод отправки формы-->
                                    @csrf <!--защита-->
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->user_for_name}}{{--$item->parentCategory->title--}}</td>
                                    <td>{{$item->user_for_email}}</td>
                                    
                                    @if ($logged_user_id==1)
                                           <td><a href="{{route('todo.edit',$item->id)}}">
                                            {{$item->task_name}}</p>{{$item->task_text}}
                                            </a></td>
                                        
                                    @else <td>{{$item->task_name}}</p>{{$item->task_text}}</td>
                                     @endif   
                                    <td><input type="checkbox" name="is_done" @if ($item->task_done==1) checked @endif  @if ($logged_user_id!=1) disabled @endif/></td>
                                    <td><button type="submit" class="btn btn-primary" @if ($logged_user_id!=1) disabled @endif>Сохранить</button></td>
                                    <td>@if ($item->created_at!=$item->updated_at) изменено администратором @endif</td>
                                    
                                </tr>  
                            </form>   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
           
            </div>
        </div>
            @if ($paginator->total() > $paginator->count())
                <br>
                <div class="row justify-contene-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{$paginator->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
    </div>
@endsection