@extends('layouts.app')

@section('content')

@php /* @var \App\Models\BlogCategory $item */@endphp

    <form method="POST" action="{{ route('todo.update', $item->id) }}">
        @method('PATCH') <!--метод отправки формы-->
        @csrf <!--защита-->
        <div class="container">
            @php
            @endphp   

            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span arial-hidden="true"></span>
                            </button>
                            {{$errors->first()}}
                        </div>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="row justify conyent-center">
                    <div class="col-md-11">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                            {{session()->get('success')}}
                        </div>
                    </div>
                </div>
            @endif


            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('todo.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('todo.includes.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>


    
@endsection