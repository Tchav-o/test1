#Laravel 8 project for creating users profile.

Self-contained website that allows users to register, login, and view/edit their profile information.

Ability to change password, add image (cropped and resized).
Image has its own url.

(There is a commented code in "UploadImageController.php" file, for uploading image without resizing and cropping
but for that you have to run this command:

"php artisan storage:link"  

to link the storage dir to a real url.)

To start:
1. copy the project;
2. create copy of ".env.example" in new file ".env"
3. edit ".env":
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel  <-- your database
   DB_USERNAME=root  <-- your username
   DB_PASSWORD=  <-- your password
4. run:
   "composer update"
   "php artisan serve"
5. goto http://127.0.0.1:8000


that is it.




