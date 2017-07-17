<?php
namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Respond;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
class MessagesController extends Controller
{

    public function index()
    {
        $this->authorize('topAdminView', User::class);
        $messages = Message::all();
        return view('back.pages.messages.index', ['messages' => $messages, 'title' => 'Сообщения']);
    }

    public function message($id)
    {
        $this->authorize('topAdminView', User::class);
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
        $this->authorize('topAdminView', User::class);
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

        $this->authorize('create', Respond::class);

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

    public function editRespond($id)
    {

        try {
            $respond = Respond::findOrFail($id);

            $this->authorize('update', Respond::class);

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
        $this->authorize('update', Respond::class);

        try {
            Respond::findOrFail($id);
        } catch (\Exception $e) {
            abort(404, trans('custom.err_edit'));
        }

        $this->validate($request, [
            'respond' => 'required|min:2',
        ]);

        Respond::where('id', $id)
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

    public function delete($id)
    {
        $this->authorize('delete', Message::class);

         Message::destroy($id);

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
        $this->authorize('delete', Respond::class);

        Respond::destroy($id);

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