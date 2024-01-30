## Laravel Repository Pattern
controller, service, repository Layer

Repository를 DI하여 DB유연성을 위한 패턴을 만들어 보았다

service를 공통으로 각각의 controller로 View와 API를 호출

token은 sanctum이용

upload는 S3로...

View 작업중...

## .env
APP_NAME=Laravel

APP_ENV=local

APP_KEY=base64:E4OBouHRFCq+6BckgIfZvkx2ka5LYcvumY7RgVUrDqQ=

APP_DEBUG=true

APP_URL=http://localhost

LOG_CHANNEL=stack

LOG_DEPRECATIONS_CHANNEL=null

LOG_LEVEL=debug

DB_CONNECTION=mysql

DB_HOST=

DB_PORT=3306

DB_DATABASE=

DB_USERNAME=

DB_PASSWORD=

AWS_ACCESS_KEY_ID=

AWS_SECRET_ACCESS_KEY=

AWS_DEFAULT_REGION=us-east-1

AWS_BUCKET=

AWS_USE_PATH_STYLE_ENDPOINT=false

AWS_ACCESS_KEY_ID=

AWS_SECRET_ACCESS_KEY=

AWS_REGION=ap-northeast-2
