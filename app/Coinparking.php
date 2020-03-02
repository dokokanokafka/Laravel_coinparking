<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Coinparking extends Model
{
    //DB接続するテーブル名を入れる
    protected $table = 'coinparking'; 
    
    //書き換えできるカラムをここで指定(ホワイトリスト)＝他のデータ(入力日時)は書き換えできないようにする
    //一対他の関係にしたいためuser_idを追加
    protected $fillable = ['user_id','name','price','memo']; 
    
    //時間差から料金を計算する算式
    //さらに深掘りした計算処理を入れるのが今後の課題
    public function calcFee($period){
        return (int)$this->price * ceil($period / 30);//thisは$periodのこと？
    }

}


