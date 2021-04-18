<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use App\Helpers\CustomUrl;
use Illuminate\Http\Request;
use App\Jobs\ProcessImageSmall;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;
use App\Http\Requests\UpdatePostPut;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','rol.admin']);
        App::setLocale('es');
    }

    public function index(Request $request)
    {

        Log::warning('Error para el usuario 1',['id' => 5]);

        $posts = Post::with('category')
        ->orderBy('created_at',request('created_at','DESC'));

        if($request->has('search'))
        {
            $posts = $posts->where('title','like','%'.request('search').'%');
        }
        $posts = $posts->simplePaginate(10);
        return view('dashboard.post.index',['posts'=>$posts]);
    }

    public function create()
    {
        $tags = Tag::pluck('id','title');
        $categories = Category::pluck('id','title');
        $post = new Post();
        return view('dashboard.post.create',compact('post', 'categories', 'tags'));

    }

    public function store(StorePostPost $request)
    {
        if($request->url_clean == ''){
            $urlClean = CustomUrl::urlTitle(CustomUrl::convertAccentedCharacters($request->title),'-',true);
        }else{
            $urlClean = CustomUrl::urlTitle(CustomUrl::convertAccentedCharacters($request->url_clean),'-',true);        
        }

        $requestData = $request->validated();
        $requestData['url_clean'] = $urlClean;
        $validator = Validator::make($requestData,StorePostPost::myRules());

        if ($validator->fails()) {
            return redirect('dashboard/post/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $post = Post::create($requestData);
        $post->tags()->sync($request->tags_id);

        return back()->with('Maquina','POST CREADO CON EXITO');
    }

    public function show(Post $post)
    {
        return view('dashboard.post.show',['post'=>$post]);
    }

    public function edit(Post $post)
    {
        $tags = Tag::pluck('id','title');
        $categories = Category::pluck('id','title');
        return view('dashboard.post.edit',compact('post', 'categories', 'tags'));
    }

    public function image(Request $request,Post $post){
        
        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png|max:10240'
        ]);

        $filename = time() . "." . $request->image->extension();
        $request->image->move(public_path('images'), $filename);

        $image = PostImage::create(['image'=> $filename, 'post_id' => $post->id ]);

        ProcessImageSmall::dispatch($image);
        return back()->with('Maquina','Imagen subida con éxito');
    }

    public function imageDownload(PostImage $image){
        //return Storage::disk('local')->download($image->image);
    }

    public function imageDelete(PostImage $image){
        $image->delete();
        Storage::disk('local')->delete($image->image);
        return back()->with('Maquina','IMAGEN ELIMINADA');
    } 

    public function update(UpdatePostPut $request, Post $post)
    {
        $post->tags()->sync($request->tags_id);
        $post->update($request->validated());
        return back()->with('Maquina','POST ACTUALIZADO CON ÉXITO');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('Maquina','TARGET ELIMINADO');
    }


}
