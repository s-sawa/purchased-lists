<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchased_list;
use App\Http\Requests\Purchase\CreateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function getData()
    {
        // $lists = Purchased_list::all();
        $lists = Purchased_list::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->get();
        //purchase/index.blade.phpへ$listsを渡す
        return view('purchase.index')->with('lists', $lists);
        // return view('purchase.index')->with('lists', $lists);
    }

    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|min:1|max:255',
            'item_maker' => 'required|min:1|max:255',
            'item_value' => 'required|min:1|max:10',
            'want_level' => 'required',
        ]);

        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        //以下に登録処理を記述（Eloquentモデル）

        // Eloquentモデル purchased_lists
        $memo = new Purchased_list;
        $memo->user_id  = Auth::user()->id; //追加のコード
        $memo->item_name   = $request->item_name;
        $memo->item_maker = $request->item_maker;
        $memo->item_value = $request->item_value;
        $memo->want_level = $request->want_level;
        $memo->save();
        return redirect('/')->with('successMessage', '< メモ追加しました >');
    }

    public function ajax(){
        $id = request()->get('id');
        $list = Purchased_list::where('id', $id)->firstOrFail();
        return $list;
    }

    public function update(Request $request, Purchased_list $purchased_list)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|min:1|max:255',
            'item_maker' => 'required|min:1|max:255',
            'item_value' => 'required|min:1|max:10',
            'want_level' => 'required',
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
            // return redirect('/' . $request->id)
                ->withInput()
                ->withErrors($validator);
        }

        //データ更新
        $list = Purchased_list::where('user_id', Auth::user()->id)->find($request->id);
        $list->item_name   = $request->item_name;
        $list->item_maker = $request->item_maker;
        $list->item_value = $request->item_value;
        $list->want_level = $request->want_level;
        $list->save();
        return redirect('/');
    }

    public function ajaxDestroy(Request $request) {
        $list = Purchased_list::findOrFail($request->id);
        $list->delete();
        return response()->json(['success' => true, 'message' => '削除しました']);
        // return redirect('/')->with('feedback.success', "削除しました");
    }
}