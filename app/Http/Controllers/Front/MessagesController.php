<?php
namespace App\Http\Controllers\Front;

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
        return view('front.pages.messages', ['messages' => $messages, 'title' => 'Сообщения']);
    }

    public function addPost(Request $request)
    {
        if(!Auth::check()){
            abort(403, trans('custom.view_need_auth'));
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
            ->route('front.pages.messages')
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
            ->route('front.pages.messages')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_deleted'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }

}