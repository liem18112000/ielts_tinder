đầu tiên chạy lệnh
	composer install (composer update)
	npm install
	npm run dev
	-- Nếu lỗi khi cài npm chạy : npm audit fix
	
Sau đó tạo file .env và copy những dòng sau vào :


===========================.env=================================
APP_NAME=IeltsTinder
APP_ENV=local
APP_KEY=base64:lbXztEB00HSaHjDF9pUrt+keHTyh+BMbzVGGMKgK/gs=
APP_DEBUG=true
APP_URL=http://localhost/ielts_tinder/public/

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ielts_tinder
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

FACEBOOK_CILENT_ID=259715891721512
FACEBOOK_CLIENT_SECRET=da321336b5a6eb6578ca283920d4fe26
FACEBOOK_URL=http://localhost/ielts_tinder/public/login/facebook/callback

GOOGLE_CILENT_ID=534466436933-7t0cml9j9lfpgbf7s48uijqb99p4vp2f.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=Bj4ZegoGarj61H8xpW-FW2pB
GOOGLE_URL=http://localhost/ielts_tinder/public/login/google/callback

ZOOM_CLIENT_KEY=8VQzcQX6hMKVvB0N8SvLnYLoQwTLAYojxHOG
ZOOM_CLIENT_SECRET=Yb906KlD0Ve5I5qZuM8tpo3hZDTJMxN9cQnq
===========================.env=================================



Sau đó cài csdl trong raw\Database\ielts_tinder.sql vào DB (import trên phpMyAdmin)




	