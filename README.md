## コインパーキング料金計算

概要：コインパーキングを登録し、利用したい時間の範囲を選択すると  
&emsp;&emsp;&emsp;料金を計算することができます。

## リンク

https://coinparking-price-calculation.com

会員登録が不要の専用ログインフォームを設けております。
是非ご操作ください。  
※以下のログイン情報は予め入力されております。  
ID:`dokokanokafka@gmail.com` PW:kyoto2020  

## 使用方法

1.ログインをお願いします。  

2.コインパーキング登録をしてください。    
&emsp;※予めデモデータが入力されております。  
&emsp;・コインパーキングの名称、30分料金、メモを登録してください。  
&emsp;・登録されると一覧表示されます。  
&emsp;・後から登録内容の修正及び削除も可能です。  

3.時間計算をしてください。  
&emsp;・計算したい期間を「いつから」「いつまで」を選択し  
&emsp;&emsp;「この条件で料金検索」ボタンをクリックしてください。  
&emsp;・計算結果は登録一覧に表示されるようになります。  
  

## 使用技術

- PHP 7.3  
- Laravel 6  
- Bootstrap 4   
- Javascript  
- Vue.js 12  
- MySQL 8 (MySQL Workbench)  
- MAMP(Local開発)  
- AWS  
   -&nbsp;Lightsail(LAMP Stack)  
   -&nbsp;Route53  
   -&nbsp;IAM  
   -&nbsp;CloudWatch  
- Github  

## 機能一覧

- ログイン機能  
- CRUD機能  
- 時間料金計算(Carbon)  
- バリデーション機能(コインパーキング登録、時間計算)  
- SSL化(Let`s encrypt/Lego Client)  

## 開発した背景

私が在住している京都市は土地が狭く、現業で勤めているホテルは専用駐車場がありません。  
各地域から車でいらっしゃったお客様に対しては、
周辺にあるコインパーキングをご案内しております。  

周囲に小型のコインパーキングが多く点在しており、チェックアウトまでの間  
コインパーキングを利用すると時間料金がいくらになるか、お客様から質問される事があります。  
その際に、迅速にお答えできる方法はないだろうかと考えたのが
今回開発に至った背景となります。  

本アプリケーションでは、個人使用で利用可能性のある  
コインパーキングを各自登録するという設計で開発いたしましたが、  
管理側がデータを登録及び公開し、一般ユーザーが利用するようなアプリケーションとして  
展開できる可能性はあると考えます。  

一部の大手企業のみ、空車や時間料金の確認を行えるアプリケーションはありますが、  
全てのコインパーキングの料金を一覧で確認できるプラットフォームが現状はない認識です。  
その為、ユーザー側としては十分に需要のある情報になりえると思っております。  
