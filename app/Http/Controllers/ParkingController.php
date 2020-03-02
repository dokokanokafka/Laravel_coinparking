<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coinparking;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

//ファイル名ではなくclass名を記述しないといけないので注意！
use App\Http\Requests\ParkingFormRequest;
// use App\Http\Requests\PriceDiffRequest;


class ParkingController extends Controller
{
//	====show=======================================================
//認証なければトップ画面に行くようにする
public function __construct()
{
  /*$method = explode('/', url()->current());
  //dd($method);
  if(count($method) > 3){
    $method = $method[3];
  }

  if($method != 'index'){
    //return view('login');
    //return redirect('/index');
    $this->middleware('auth');
  }*/
  $this->middleware('auth');
}
//index表示
    public function index() {
      //DBから全てのデータを持ってくる→1対多だと不要
      //$parkings = Coinparking::all();
      //echo('<pre>');
      //var_dump(Auth::user()->coinparkings,Auth::user()->coinparkings());
      //echo('</pre>');die;
      
      //DBからログインしたユーザーidの分だけ表示 useの表記を忘れずに！！
      if(Auth::check()){
        $parkings = Auth::user()->coinparkings;
      }else{
        $parkings = [];
      }
      return view('parking', ['parkings' => $parkings]);
      }

//	====create======================================================
  // バリデーション
  public function create(ParkingFormRequest $request)
  {
      $coinparking = new coinparking(); //DBに挿入するデータを$coinparkingとして宣言
      // リクエストパラメータから値を取得
      //$coinparking->fill($request->all()); //一対多の関係だと不要！
      //ログインしてるアカウント分のみ表示
      Auth::user()->coinparkings()->create($request->all());

//      $coinparking->save();//保存するコード 一対多の関係だと不要！
      return redirect('/');
  }

//	====calculation===============================================
public function calculation(Request $request){
// dd($request);
  $parkings = Auth::user()->coinparkings;

//時間を取得し時間差を計算
$date_str1 = $request->from_date. ' '.$request->from_hour.':'.$request->from_min;
$date1 = new Carbon($date_str1);//carbonで時間取得
$date_str2 = $request->to_date. ' '.$request->to_hour.':'.$request->to_min;
$date2 = new Carbon($date_str2);//carbonで時間取得
$period = $date1->diffInMinutes($date2);//carbon使用で差分を計算

//計算処理はモデルにて

//変数を作成し2つの配列を入れる
$valid_data = [
  'date_str1' => $date_str1,
  'date_str2' => $date_str2,
];
//この記述方法も可能
// $valid_data['date_str1'] = $date_str1;
// $valid_data['date_str2'] = $date_str2;

//バリデーション
$rules = [ 
  'date_str2' => 'after_or_equal:date_str1',
];
$messages =[
'date_str2.after_or_equal' => '計算結果が表示されません。”いつまで”の日付と時刻をご確認ください。',
];

$validator = Validator::make($valid_data, $rules, $messages);

//空欄入力の際のエラー通知
if ($validator->fails()) {
  return redirect('/')
  ->withInput()
  ->withErrors($validator);    
} 

//料金計算結果を表示させる
$fee = [];//配列だから？
foreach($parkings as $parking){
  $fee[] = $parking->calcFee($period);
}

   return view('parking', ['parkings' => $parkings, 'fee' => $fee]);
}

//	====edit======================================================
//参考 https://qiita.com/yukibe/items/da6b49ed05e04e21017f
public function edit($id)
{ 
    $parking = Coinparking::find($id);//モデル経由でidを特定
    return view('edit',['parking' => $parking]); //どの番号か渡す
}

//更新
public function update(ParkingFormRequest $request,$id)//request 消すとエラー
{

  $coinparking = Coinparking::find($id);
  //各内容を更新
  $coinparking->name = $request->name;
  $coinparking->price = $request->price;
  $coinparking->memo = $request->memo;
  //保存
  $coinparking->save();
  return redirect('/');

}

 //	====delete======================================================
  public function delete($id)//idが格納されてる
    {
        $coinparking =Coinparking::find($id);
        $coinparking->delete();
        return redirect('/');
    }

}



