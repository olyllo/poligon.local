@php /* @var \App\Models\BlogCategory $item */@endphp
@php /* @var \App\Models\TodoList $item */@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                </ul>
                <br>
                <div class ="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="user_for_name">Задача для</label>
                            <input name="user_for_name" value="{{$item->user_for_name}}"
                                    id="user_for_name"
                                    type="text"
                                    class="form-control"
                                    minlength="3"
                                    required>
                        </div>
                        <div class="form-group">
                            <label for="user_for_email">Почта пользователя</label>
                            <input name="user_for_email" value="{{$item->user_for_email}}"
                                    id="user_for_email"
                                    type="text"
                                    class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="task_done">Статус задачи</label>
                            <select name="task_done" value="{{$item->task_done}}"
                                    id="task_done"
                                    class="form-control"
                                    placeholder="Выберите статус"
                                    required>
                               
                                    <option value="1"
                                        @if ($item->task_done==1) selected @endif>
                                        1
                                    </option>
                                    <option value="0"
                                        @if ($item->task_done==0) selected @endif>
                                        0                                       
                                    </option>
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="task_name">Название задачи</label>
                            <textarea name="task_name"
                                    id="task_name"
                                    class="form-control"
                                   rows="3">
                                   {{old('task_name', $item->task_name)}}
                            </textarea>
                        </div>        
                        <div class="form-group">
                            <label for="task_text">Текст задачи</label>
                            <textarea name="task_text"
                                    id="task_text"
                                    class="form-control"
                                   rows="3">
                                   {{old('task_text', $item->task_text)}}
                            </textarea>
                        </div>                     
                    </div>
                </div>
            </div>



            
        </div>
    </div>
</div>