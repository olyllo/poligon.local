<?php

namespace App\Http\Controllers\Todo;

use App\Models\TodoList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Cookie;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $logged_user_id = Auth::id();
        $todoList = TodoList::all();
        //dd($_GET);
        if(($_GET==array())&&(!isset($_COOKIE['sort_direction']))){
           // echo "here1";die;
            $paginator=TodoList::orderBy('id', 'asc')->paginate(3);
            $sort_by='';
        }
        else
        {
            $sort_by='';
            if(($_GET==array())&&(isset($_COOKIE['sort_direction']))){
               // echo "here2";die;
                $sort_by=$_COOKIE['sort_direction'];
            }
            elseif(isset($_GET['category'])){
                $sort_data=$_GET;
                setcookie("sort_direction", $sort_data['category'], time()+3600);
                $sort_by=$sort_data['category'];
                
            }
            elseif((!isset($_GET['category']))&&(isset($_COOKIE['sort_direction']))){
                $sort_by=$_COOKIE['sort_direction'];
            }

            if ($sort_by=='user_email_sort_ASC'){
                $paginator=TodoList::orderBy('user_for_email', 'asc')->paginate(3);
            }elseif ($sort_by=='user_email_sort_DESC'){
                $paginator=TodoList::orderBy('user_for_email', 'desc')->paginate(3);
            }elseif ($sort_by=='user_name_sort_ASC'){
                $paginator=TodoList::orderBy('user_for_name', 'asc')->paginate(3);
            }elseif ($sort_by=='user_name_sort_DESC'){
                $paginator=TodoList::orderBy('user_for_name', 'desc')->paginate(3);
            }elseif ($sort_by=='status_sort_ASC'){
                $paginator=TodoList::orderBy('task_done', 'asc')->paginate(3);
            }elseif ($sort_by=='status_sort_DESC'){
                $paginator=TodoList::orderBy('task_done', 'desc')->paginate(3);
            }
        }
        //dd($sort_by);
       // if ($sort_by)
        return view('todo.index', compact('paginator','logged_user_id','sort_by'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TodoList::findOrFail($id);
        //$item[] = BlogCategory::where('id', $id)->first();//равенство, где ид равен 
        $TodoList = TodoList::all();
        return view('todo.edit', compact('item', 'TodoList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$data = $request->all();
       // dd();
        //dd(__METHOD__, $request->all(),$id);
        
       // echo "here";die;
        $item = TodoList::find($id);
        //dd($item);
        if(empty($item)){
            return back()
                -> withErrors(['msg'=>"Запись id=[{$id}] не найдена"])
                -> withInput();
        }
        
        $data = $request->all();
        
       if(!isset($data["is_done"])||$data["task_done"]==0) {$data["task_done"]=0;}
       else {$data["task_done"]=1;}
        $result = $item->fill($data)->save();
     //  dd($data);
     //  dd($result);

        if ($result){
            return redirect()
                ->route('todo.edit', $item->id)
                ->with(['success'=>'Успешно сохранено']);
        } else{
            return back()
            ->withErrors(['msg'=>'Ошибка сохранения'])
            ->withInput();
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
