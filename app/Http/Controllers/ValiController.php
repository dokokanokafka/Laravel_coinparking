<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ValiController extends Controller
{
    public function create(Request $request)
    {
    //有効なデータが入っているかチェックする機能
    $rules = [ 
        'name' => 'required|max:255',
        'price' => 'required|numeric',
    ];
     $messages =[
      'name.required' => '”名称”は必須項目です。',
      'price.required' => '”15分料金”は必須項目です。',
      'price.required' => '”15分料金”の箇所には数字を入力して下さい。',
     ];
  
    $validator = Validator::make($request->all(), $rules, $messages);
  //空欄入力の際のエラー通知
        if ($validator->fails()) {
            return redirect('/')
            ->withInput()
            ->withErrors($validator);    
  } 

}
}
