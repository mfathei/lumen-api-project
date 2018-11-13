# Lumen PHP Framework project

#### Tutorial:
https://auth0.com/blog/developing-restful-apis-with-lumen/

#### Run steps
1- After you clone this project using git clone create a database and edit .env file variables then run this in root folder using terminal:
<pre>
`composer update`
`php artisan db:migrate`
`php artisan db:seed`
`php -S 0.0.0.0:8000 -t public`
</pre>
2- Navigate to http://127.0.0.1:8000/docs/index.html

##### To run this API Documentation open this url:
http://127.0.0.1:8000/docs/index.html
click on `GET /authors` the click `Try it out` then click `Execute` button
