<?php

namespace App\Http\Controllers;
use App\Tag;
use App\Article;
use App\Http\Requests\StoreArticle;
use Illuminate\Contracts\Support\JsonableInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Validation\Rules\Exists;

class ArticlesController extends Controller
{
    public function index(){
        // $articles = Article::latest()->paginate(5);
        if(request('tag')){

            $articles = Tag::where('name',request('tag'))->firstOrFail()->articles;
        }
        return Article::paginate(5)->toJson();
            // return view('articles.index', [
            //     'articles' => $articles
            //     ]);


    }

    public function show( Article $article/*$id*/){
        // $article =Article:: findOrFail($id);
        //Article $article work as Article::where('id',1)->first(); it's all behind the scene;
        //  And parameter $article name should match with parameter passed in controller
        //  $article =Article:: findOrFail($id);
        return view('articles.show',['article' => $article]);
    }

    public function create(){

        return view('articles.create',[
            'tags' => Tag::all()
        ]);
            // show a view to create a new resource
    }

    public function store(StoreArticle $request){
            // $this->ValidateArticle();
            $request->validated();
            $article=new Article(request(['title','excerpt','body'])) ;
            $article->user_id=1;
            //auth->id;
            //auth()->user()->articles()->create($article);
            $article->save();
            $article->tags()->attach(request('tags'));
         // dump(request()-> all()); it will dump all the data coming from form
        // persist the new resource
        // dd($request->all());
        // $article = new Article();
        // $article ->title= request('title');
        // $article ->excerpt= request('excerpt');
        // $article ->body= request('body');
        // $article->save();
        // Article::create([
        //     'title'=>request('title'),
        //     'excerpt'=>request('excerpt'),
        //     'body'=> request('body')
        // ]);


        return redirect(route('articles.index'));
    }



    public function edit(Article $article){
        // show a view to edit an existing resource
        //$data['article'] =Article::find($id)->first();
       // dd($data);
       //$article =Article:: findOrFail($id);
        return view('articles.edit',compact('article'));

    }

    public function update(StoreArticle $request,Article $article){
        // persist the edited resource

        // we find the article with particular id

        // $article =Article::find($id)->first();

        // we requesting from editing form to submit the edited data

    //     $article ->title= request('title');
    //     $article ->excerpt= request('excerpt');
    //     $article ->body= request('body');
    //     $article->save();

        // here we have inlined the validate and request function together

        //   $article->update(request()->Validate([
        //         'title'=> 'required',
        //         'excerpt'=>'required',
        //         'body'=> 'required'
        //     ]));

        /* here we have made a protected function ValidateArticle() to request and validate data
          to reduce duplication code */

            $article->update($request->validated());
            return redirect($article->path());

            /*It is using name name that we have given to the route in web.route
            it is little more robust than the method we applied above
            return redirect(route('articles.show',$article));
            */

    }
    // protected function ValidateArticle(){
    //     return request()->validate([
    //         'title'=>'required',//['required','min:3','max'255']
    //         'excerpt'=>'required',
    //         'body'=>'required',
    //         'tags'=>'exists:tags,id'
    //     ]);
    // }
    public function destroy(){

        //Delete the resource
    }

}
