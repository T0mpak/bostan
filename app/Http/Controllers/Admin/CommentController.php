<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        $this->authorize('do_admin_stuff', Comment::class);
        $comments = Comment::paginate(12);

        return view('admin.comment.showcomments',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Empty
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|max:100',
        ]);

        Comment::create([
            'body' => $request->body,
            'user_id' => $request->user()->id,
            'news_id' => $request->news_id
        ]);

        return redirect()->back()->with('status', 'Вы успешно добавил комментарий к записи: '.$request->news_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Empty
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('do_admin_stuff', Comment::class);
        $comment = Comment::findOrFail($id);

        return view('admin.comment.edit', compact('comment'));
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
        $this->authorize('do_admin_stuff', Comment::class);
        $request->validate([
            'body' => 'required|max:100',
        ]);

        Comment::whereId($id)->update([
            'body' => $request->body
        ]);

        return redirect()->route('admin.comment.index')->with('status-update', 'Комментарий успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('do_admin_stuff', Comment::class);
        Comment::destroy($id);

        return redirect()->route('admin.comment.index')->with('status-delete', 'Комментарий успешно удален');
    }
}
