<?php


use App\Http\Controllers\Controller;
use Models\Post;

class MyPostController extends Controller
{
    public function index() {
        //!вывод записи и части записи из базы
        /*$post = Post::find(0);
        dd($post);
        dd($post->title);*/

        //!вывод всех постов и вывод всех заголовком постов
        $posts = Post::all();

        //!передача во вью данных из базы, компакт - передача во вью переменной пост
        return view('post.index', compact('posts'));

        //!выбор первого из опубликованных постов
        /*$post = Post::where('is_published', true)->first();
        dump($post->title);
        dd('End');*/
    }

    //!функция получения данных от формы на странице
    public function store() {
        //!схема передачи данных в бд
        $data = request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string',
            'likes'=>'integer',
        ]);
        //!создание новой записи в базе данных
        Post::create($data);
        //!редирект на страницу с постами
        return redirect()->route('post.index');
    }

    //!показ определенного поста по запросу id
    public function show(Post $post) {
        //!найти объект, если нет верни 404
        return view('post.show', compact('post'));
    }

    //!функция редактирования поста
    public function edit(Post $post) {
        return view('post.edit', compact('post'));
    }

    //!создание записи в бд
    public function create() {
        return view('post.create');
    }
    /*public function create()
    {
        $postsArr = [
            [
                'title' => 'First post',
                'content' => 'This is my first post',
                'image' => 'Image post 1',
                'likes' => 20,
                'is_published' => true
            ],
            [
                'title' => 'Second post',
                'content' => 'This is my second post',
                'image' => 'Image post 2',
                'likes' => 20,
                'is_published' => true
            ]
        ];
        //!добавление всех постов в дб
        foreach ($postsArr as $item) Post::create($item);
        dd('Created');
    }*/

    //!изменение записи в бд
    public function update(Post $post) {

        $data = request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string',
            'likes'=>'integer',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }
    //!удаление записи в бд
    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('post.index');
    }

    //!удаление записи в бд
    public function delete() {
        $post = Post::find(2);
        $post->delete();
        dd('delete page');
    }

    //!восстановление записи в бд
    public function restore() {
        //!поиск в мусорке
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('post restored');
    }

    //!добавление записи с проверкой на уникальность (firstOrCreate)
    public function firstOrCreate() {
        //!создание поста
        $anotherPost = [
            'title' => 'Third post',
            'content' => 'This is my 3 post',
            'image' => 'Image post third',
            'likes' => 50000,
            'is_published' => true
        ];

        //!проверка на уникальность по ключу title (если находит, то возвращает, если нет, то добавляет)
        $post = Post::firstOrCreate([
            'title' => 'This is my 5 post'
        ],[
            'content' => 'some post',
            'image' => 'some post',
            'likes' => 100000,
            'is_published' => true
        ]);
        dump($post->title);
        dd('End');
    }

    //!обновление записи с проверкой на уникальность (updateOrCreate)
    public function updateOrCreate() {
        //!создание поста
        $anotherPost = [
            'title' => 'updateOrCreate Post',
            'content' => 'updateOrCreate Post',
            'image' => 'updateOrCreate Post',
            'likes' => 1,
            'is_published' => false
        ];

        //!проверка на уникальность по ключу title (если находит, то обновляет, если нет, то добавляет)
        $post = Post::updateOrCreate([
            'title' => 'This is my 10 post'
        ],[
            'content' => 'updateOrCreate Post',
            'image' => 'updateOrCreate Post',
            'likes' => 1,
            'is_published' => false
        ]);
        dump($post->content);
        dd('Hello!');
    }
}
