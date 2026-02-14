# 🗓 スケジュール管理アプリ

## ■ 概要
Laravel を用いたスケジュール管理アプリです。  
ログインユーザーごとに予定を管理でき、カレンダーと連動して日別表示を行います。

---

## ■ 主な機能

- ユーザー認証（Laravel Auth）
- 予定の作成 / 更新 / 削除
- 完了ステータス管理
- 日付ごとの予定表示（GETパラメータ制御）
- FullCalendar によるカレンダー表示
- カテゴリー管理
- ログインユーザー単位でのデータ分離

---

## ■ 技術スタック

- PHP 8.5.2
- Laravel 12.50.0
- MySQL
- TailwindCSS
- FullCalendar
- Laravel Sail

---

## ■ データベース設計

### schedules テーブル
| カラム名 | 型 | 説明 |
|----------|----|------|
| id | bigint | 主キー |
| user_id | bigint | ユーザーID |
| category_id | bigint | カテゴリーID |
| title | varchar | 予定タイトル |
| start_at | datetime | 開始日時 |
| end_at | datetime | 終了日時 |
| is_completed | boolean | 完了フラグ |
| created_at | timestamp | 作成日時 |
| updated_at | timestamp | 更新日時 |

### categories テーブル
| カラム名 | 型 | 説明 |
|----------|----|------|
| id | bigint | 主キー |
| name | varchar | カテゴリー名 |

---


