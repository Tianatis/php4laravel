<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Respond;
use Illuminate\Support\Facades\Gate;
class MessagesController extends Controller
{

    public function index()
    {
        $messages = Message::all();

        return view('front.pages.messages', ['messages' => $messages, 'title' => 'Сообщения']);
    }

    public function addPost(Request $request)
    {
        // опробуем  простой Gate
        /* В этом методе использовать Gate логичнее, чем политику т.к. по политике
        СуперАдмин может выполнять все действия с моделью Message. Но добавлять сообщения
        в собственную гостевую книгу? Админу больше нечем заняться? Нефиг... */

        if (Gate::denies('add-message')){
            abort(403, trans('custom.not_for_admins'));
        }else{
            $this->validate($request, [
                'message' => 'required|min:5',
            ]);
            $request->merge(['user_id' => Auth::user()->id]);

            Message::create($request->except('_token'));

            return redirect()
                ->route('front.pages.messages')
                ->with('response', [
                    'position' => 'top',
                    'text' => trans('custom.success_add'),
                    'type' => 'box',
                    'class' => 'r_success'
                ]);

        }

    }

    public function respondPost(Request $request, $id)
    {
        if(!Auth::guard('admins')->check()){
            abort(403, trans('custom.need_admin'));
        }else{
   /* опробуем  Gate::forUser передав в него  пользователя из таблицы admins  с помощью guard фильтра.
   Метод не оптимальный, и вообще тут логичней использовать политику, но чисто для практики продолжим...
   Чтобы эта проверка не вызвала ошибки, несуществующего объекта, сначала убедимся, что администратор авторизован */

  /* В принципе я могу использовать оба варианта проверки и через Auth::guard('admins')->user(),
    и через Auth::user->admin (т.к таблицы admins и users свазаны как один к одному). Второй вариант намного
     удобнее, для тех случаев, когда достаточно знать потенциальную возможность выполнить действие и не требуется
    проверть авторизацию под админом .

    Минусом способа $user->admin внутри политики является невозможность проверить залогинен ли  администратор,
    как администратор или он просматривает сайт, как пользователь. Это можно компенсировать
    с помощью Middleware isAdmin на роутах. Незалогиненный админ будет перенаправлен на форму логина в адинку.

  */
            if (Gate::forUser(Auth::guard('admins')->user())->denies('respond-message')) {
                abort(403, trans('custom.need_super_admin'));
            }else{
                try {
                    Message::findOrFail($id);
                } catch (\Exception $e) {
                    abort(404, trans('custom.err_edit'));
                }

                $this->validate($request, [
                    'respond' => 'required|min:2',
                ]);
                $request->merge(['admin_id' => Auth::guard('admins')->user()->id]);
                $request->merge(['message_id' => $id]);

                Respond::create($request->except('_token'));

                return redirect()
                    ->route('front.pages.messages')
                    ->with('response', [
                        'position' => 'top',
                        'text' => trans('custom.success_add'),
                        'type' => 'box',
                        'class' => 'r_success'
                    ]);
            }
        }

    }
    public function delete($id)
    {
        /* защита так же задана в роутах через Middleware*/
        if (Gate::denies('delete-message')) {
            abort(403, trans('custom.need_super_admin'));
        }else{
            try {
                Message::destroy($id);
                Respond::where('message_id', $id)
                    ->delete();
            } catch (\Exception $e) {
                abort(404, trans('custom.already_deleted'));
            }

            return redirect()
                ->route('front.pages.messages')
                ->with('response', [
                    'position' => 'top',
                    'text' => trans('custom.success_deleted'),
                    'type' => 'box',
                    'class' => 'r_success'
                ]);
        }
    }

    public function deleteRespond($id)
    {
        /* защита так же задана в роутах через Middleware*/
        if (Gate::forUser(Auth::guard('admins')->user())->denies('delete-respond')) {
            abort(403, trans('custom.need_super_admin'));
        }else{
            try {
                Respond::destroy($id);
            } catch (\Exception $e) {
                abort(404, trans('custom.already_deleted'));
            }

            return redirect()
                ->route('front.pages.messages')
                ->with('response', [
                    'position' => 'top',
                    'text' => trans('custom.success_deleted'),
                    'type' => 'box',
                    'class' => 'r_success'
                ]);
        }
    }

}