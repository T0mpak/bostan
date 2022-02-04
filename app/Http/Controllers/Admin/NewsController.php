<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('do_admin_stuff', News::class);

        $news = News::latest()->paginate(12);

        return view('admin.news.shownews', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('do_admin_stuff', News::class);

        return view('admin.news.showform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('do_admin_stuff', News::class);

        $request->validate([
            'title' => 'required|max:100',
            'text' => 'required|max:255',
            'file' => 'nullable|image',
        ]);

        if ($request->hasFile('file')) {
            $folder = date('Y-m-d');
            $image_file_path = $request->file->store("news_photos/{$folder}", 'public');
        } else {
            $image_file_path = "news_photos/default.jpg";
        }

        News::create([
            'title' => $request->title,
            'text' => $request->text,
            'file_path' => $image_file_path,
        ]);

        return redirect()->route('admin.news.index')->with('status-create', 'Новость успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('do_admin_stuff', News::class);

        $new = News::findOrFail($id);
        $latest_5_news = News::latest()->take(5)->get();
        $comments = Comment::where('news_id', '=', $id)->latest()->get();

        return view('news_single', compact('new', 'latest_5_news', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('do_admin_stuff', News::class);

        $new = News::findOrFail($id);

        return view('admin.news.edit', compact('new'));
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
        $this->authorize('do_admin_stuff', News::class);

        $request->validate([
            'title' => 'required|max:100',
            'text' => 'required|max:255',
            'file' => 'image',
        ]);

        $old_news_value = News::findOrFail($id);
        $image_path_for_delete = "/uploads"."/$old_news_value->file_path";

        if ($request->file) {
            $folder = date('Y-m-d');
            $image_file_path = $request->file->store("news_photos/{$folder}", 'public');
            if(file_exists(public_path($image_path_for_delete))) {
                if (strval(public_path($image_path_for_delete)) == strval(public_path("/uploads/news_photos/default.jpg"))) {
                    //nothing
                    $image_path_for_delete = '';
                } else {
                    unlink(public_path($image_path_for_delete));
                }
            }
        } else {
            $image_file_path = $old_news_value->file_path;
        }

        News::whereId($id)->update([
            'title' => $request->title,
            'text' => $request->text,
            'file_path' => $image_file_path,
        ]);

        return redirect()->route('admin.news.index')->with('status-update', 'Новость успешно изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('do_admin_stuff', News::class);

        News::destroy($id);

        return redirect()->route('admin.news.index')->with('status-delete', 'Новость успешно удалена');
    }
}
