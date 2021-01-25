<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BlogCategoryUpdateRequest;

use Validator;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(__METHOD__);
        //$paginator = BlogPost::paginate(5);
        $paginator = BlogCategory::paginate(5);
       /* foreach($paginator as $item){
            dd($item);
        }*/


        return view('blog.admin.categories.index', compact('paginator'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(__METHOD__);
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
        dd(__METHOD__);
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
        //$item[] = BlogCategory::find($id);
        $item = BlogCategory::findOrFail($id);
        //$item[] = BlogCategory::where('id', $id)->first();//равенство, где ид равен 
        $categoryList = BlogCategory::all();
        return view('blog.admin.categories.edit', compact('item', 'categoryList'));

        //dd(__METHOD__);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
      /*  $rules = [
            'title'         => 'required|min:5|max:200',
            'slug'          => 'max:200',
            'description'   => 'string|max:500|min:3',
            'parent_id'     => 'required|integer|exists:blog_categories,id',
        ];*/

        //first variant
        //$validatedData = $this->validate($request, $rules);

        //second variant 
        //$validatedData = $request->validate($rules);

        //third variant
        /*$validator = \Validator::make($request->all, $rules);
        
        $validatedData[]=$validator->passes();
        $validatedData[]=$validator->validate();
        //$validatedData[]=$validator->valid();
        $validatedData[]=$validator->failed();
        $validatedData[]=$validator->errors();
        $validatedData[]=$validator->fails();

        dd($validatedData);*/

        $item = BlogCategory::find($id);
        //dd($item);
        if(empty($item)){
            return back()
                -> withErrors(['msg'=>"Запись id=[{$id}] не найдена"])
                -> withInput();
        }
        
        $data = $request->all();
        $result = $item->fill($data)->save();
       
        if ($result){
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success'=>'Успешно сохранено']);
        } else{
            return back()
            ->withErrors(['msg'=>'Ошибка сохранения'])
            ->withInput();
        }
        dd(__METHOD__, $request->all(),$id);
        //
        
    }

    
}
