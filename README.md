# アプリケーション名 "RESE" 
#### 飲食店予約サービス
#### 登録した店舗の紹介、予約、事前決済、口コミ閲覧、お気に入り登録が可能
#### トップページ画面
![RESE](./RESE.jpg)

## 作成した目的
　卒業テスト用課題

## アプリケーションURL
　未登録
 
## 他のリポジトリ
　なし
 
## 機能一覧
- 一般ユーザー
    - 会員登録
    - メール認証機能
    - ログイン
    - ログアウト
    - ユーザー情報取得
    - お気に入り登録
    - お気に入り解除
    - お気に入り一覧表示
    - 店舗の絞込検索
    - 事前決済
    - 決済完了後予約
    - 予約削除
    - 予約履歴確認
    - 予約日当日にリマインドメール送信
    - リマインドメールに記載のQRコードでスムーズに入店
    - 来店後、口コミ及び点数評価投稿機能
    - 口コミ及び点数評価一覧表示
- 店舗責任者 
    - ログイン
    - ログアウト
    - 店舗情報変更
    - 店舗イメージ画像入れ替え（ストレージ保存）
    - 予約状況確認
    - 予約履歴確認
- 管理者
    - ログイン
    - ログアウト
    - 新規店舗登録
    - 登録店舗一覧表示
    - 登録している全一般ユーザーに対しメール送信
 
## テーブル仕様
![table](./テーブル仕様書.jpg)

## ER図
![ER](./ER.jpg)

## シーダー
- AreasTableSeeder：47都道府県記載
- ShopsTableSeeder：20件のサンプル店舗データ
- CoursesTableSeeder:どの店舗もコースAコースBコースCを記載
- GenresTableSeeder:寿司、焼肉、居酒屋、イタリアン、ラーメンを記載
- UserTableSeeder:管理者、店舗責任者、一般ユーザーのサンプルデータ記載。ファクトリーにて20件のサンプル店舗データの店舗責任者を記載。

## 仕様技術
- Laravel 8.83.27
- composer 2.4.2
- php 8.1.10
- XAMPP 8.1.10
- Apache 2.4.54(win64)
- MySQL Ver 15.1 Distrib 10.4.25-MariaDB, for Win64 (AMD64)
- node.js v18.12.0

# 環境構築
- XAMPP 8.1.10
    -  https://sourceforge.net/projects/xampp/files/latest/download
  
- composer
    - https://getcomposer.org/Composer-Setup.exe
    - Composerダウンロード後、ターミナルもしくはコマンドプロンプトにて下記コマンド
    - $ brew install composer

- git clone https://github.com/MISAKI0512/Restaurant_Reservation_Services/archive/refs/heads/main.zip
    - $ php artisan:storage link
    - $ composer install
    - .env.exampleを.envにリネーム
    - $ php artisan key:generate
    - $ php artisan migrate:fresh --seed

- mailhog
    - https://github.com/mailhog/MailHog/releases
    ※テスト時はmailhogを立ち上げた状態でテストを行ってください。
- node.js v18.12.0
    - https://nodejs.org/dist/v18.12.0/node-v18.12.0-x64.msi 

# その他
- 管理者はメールアドレス:admin@example.com  パスワード：passwordにてログイン可能
- 店舗責任者サンプルはメールアドレス:shopAdmin@example.com パスワード:passwordにてログイン可能
- 一般ユーザーサンプルはメールアドレス:user@example.com パスワード：passwordにてログイン可能
