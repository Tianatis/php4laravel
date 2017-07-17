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
        $title = 'Сообщения';

        return view('front.pages.messages', compact(['messages', 'title']));
    }

    public function addPost(Request $request)
    {
        $this->authorize('create', Message::class);

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
            ->route('front.pages.messages')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_add'),
                'type' => 'box',
                'class' => 'r_success'
            ]);

    }

    public function delete($id)
    {
        $this->authorize('delete', Message::class);

        Message::destroy($id);

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
        $this->authorize('delete', Respond::class);

        Respond::destroy($id);

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