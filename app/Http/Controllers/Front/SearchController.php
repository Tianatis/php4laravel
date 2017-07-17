<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SearchController extends Controller
{
    public function BlogPost(Request $request)
    {
        $this->validate($request, [
            'query' => 'required|max:200'
        ]);
        $result = Article::where('title', 'like', '%'.$request->input('query').'%')
            ->orWhere('content', 'like', '%'.$request->input('query').'%')
            ->orWhere('tagline', 'like', '%'.$request->input('query').'%')
            ->orderBy('id', 'DESC')
            ->get();
         return view('front.parts.search_blog_result',['search_result' => $result]);
    }

}
