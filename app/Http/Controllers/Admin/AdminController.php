<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $users_count = User::all()->count();
        $plural_user = Str::plural('User', $users_count);

        $news_count = News::all()->count();
        $plural_news = Str::plural('News', $news_count);

        $comments_count = Comment::all()->count();
        $plural_comment = Str::plural('Comment', $comments_count);

        return view('admin.index', [
            'users_count' => $users_count,
            'plural_user' => $plural_user,
            'news_count' => $news_count,
            'plural_news' => $plural_news,
            'comments_count' => $comments_count,
            'plural_comment' => $plural_comment,
        ]);
    }

    public function showusers() {
        $users = User::paginate(12);

        return view('admin.showusers', [
            'users' => $users,
        ]);
    }

    public function deleteuser($id) {
        if ($id == 1) {
            return abort(404);
        }
        $username = User::findOrFail($id)->name;
        User::destroy($id);

        return redirect()->back()->with('status-user', "Пользователь $username успешно удален из БД.");
    }
}
