# contact-form
# 確認テスト お問い合わせフォーム

## 環境構築

Dockerが導入されていることを前提とします。

1. git clone [https://github.com/tensho-takato/contact-form.git]
2. docker-compose up -d --build
3. docker-compose exec php bash
4. cp .env.example .env
5. php artisan key:generate
6. php artisan migrate --seed

使用技術
・PHP 8.0
・Laravel 10.x
・MySQL 8.0
・Docker / docker-compose

URL
・ 開発環境：http://localhost/
・ phpMyAdmin：http://localhost:8080/

