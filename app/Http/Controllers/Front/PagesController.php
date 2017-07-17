<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
class PagesController extends Controller
{
    public function index()
    {
        $count_articles = Article::all()->count();
        $articles = Article::orderBy('id', 'DESC')
            ->published()
            ->paginate(5);
        $slides = Slider::all();
        $title = 'Главная';
        return view('front.pages.index', compact(['articles', 'title', 'slides', 'count_articles']));
    }

    public function about()
    {
        $title = 'О бологе';
        $content = '<p>Этот блог создан в рамках курса PHP Strong (PHP4)</p>';

        return view('front.pages.about', compact(['content', 'title']));
    }

    public function contacts()
    {
        $title = 'Обратная связь';

        return view('front.pages.contacts', compact(['content', 'title']));

    }
    public function contactsPost(Request $request)
    {
        $this->authorize('sendMessage', User::class);
        $this->validate($request, [

                'email' => 'required|email|min:3',
                'name' => 'required|min:3|alpha',
                'title' => 'required|min:5',
                'content' => 'required|min:5'
            ]);
            $title = $request->input('title');
            $name = $request->input('name');
            $content = $request->input('content');
            $mail_data = $request->except('_token');
            Mail::send('emails.send', compact(['content', 'title', 'name']), function ($message) use ($mail_data)
            {
                $message->from(config('mail.from.address'), config('mail.from.name'));
            /*    Закомментированная строка и создавала ошибку
                "ErrorException in MailServiceProvider.php  Undefined index: name"
                'name' надо объявлять либо в конфиге, либо тут.
            */
           //   $message->to(config('mail.to.address'), config('mail.to.user'));
                $message->subject($mail_data['title']);
                $message->replyTo($mail_data['email'], $mail_data['name']);


            });

        return redirect()
            ->route('home')
            ->with('response', [
                'position' => 'top',
                'text' => 'Ваше сообщение отправлено',
                'type' => 'box',
                'class' => 'r_success'
            ]);

    }

}
