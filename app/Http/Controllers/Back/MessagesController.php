<?php
namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Respond;
class MessagesController extends Controller
{

    public function index()
    {
        $messages = Message::all();
        return view('back.pages.messages.index', ['messages' => $messages, 'title' => 'Сообщения']);
    }

    public function message($id)
    {
        try {
            $message = Message::findOrFail($id);
        } catch (\Exception $e) {
            abort(404, trans('custom.err_article'));
        }

        $title = 'Сообщение №'.$message->id;
        return view('back.pages.messages.message', compact(['message', 'title']));
    }

    public function respond($id)
    {
        try {
            $message = Message::findOrFail($id);
        } catch (\Exception $e) {
            abort(404, trans('custom.err_article'));
        }
        $title = 'Ответ на сообщение №'.$id;
        return view('back.pages.messages.add_respond', compact(['message', 'title']));
    }



    public function respondPost(Request $request, $id)
    {
        if(!Auth::guard('admins')->check()){
            abort(403, trans('custom.need_admin'));
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
                ->route('back.pages.messages.index')
                ->with('response', [
                    'position' => 'top',
                    'text' => trans('custom.success_add'),
                    'type' => 'box',
                    'class' => 'r_success'
                ]);

        }

    }

    public function editRespond($id)
    {
        try {
            $respond = Respond::findOrFail($id);
            $message = Message::where('id', $respond->message_id)
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404, trans('custom.err_article'));
        }
        $title = 'Редактирование ответа на сообщение №'.$id;
        return view('back.pages.messages.edit_respond', compact(['message', 'respond', 'title']));
    }


    public function editRespondPost(Request $request, $id)
    {
        if(!Auth::check()){
            abort(403, trans('custom.view_need_auth'));
        }else{
            try {

                $respond = Respond::findOrFail($id);
                $message = Message::where('id', $respond->message_id)
                    ->firstOrFail();
            } catch (\Exception $e) {
                abort(404, trans('custom.err_article'));
            }
            $this->validate($request, [
                'respond' => 'required|min:2',
            ]);

            Respond::where('message_id', $id)
                ->update($request->except('_token'));

            return redirect()
                ->route('back.pages.messages.index')
                ->with('response', [
                    'position' => 'top',
                    'text' => trans('custom.success_update'),
                    'type' => 'box',
                    'class' => 'r_success'
                ]);

        }

    }

    public function delete($id)
    {
        /* защита задана в роутах*/
        try {
            Message::destroy($id);
            Respond::where('message_id', $id)
                ->delete();
        } catch (\Exception $e) {
            abort(404, trans('custom.already_deleted'));
        }

        return redirect()
            ->route('back.pages.messages.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_deleted'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }

    public function deleteRespond($id)
    {
        /* защита задана в роутах*/
        try {
            Respond::destroy($id);
        } catch (\Exception $e) {
            abort(404, trans('custom.already_deleted'));
        }

        return redirect()
            ->route('back.pages.messages.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_deleted'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }

}