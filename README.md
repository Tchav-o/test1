# Laravel 8 project for creating users profile.

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
3. edit ".env":<br>
   DB_CONNECTION=mysql<br>
   DB_HOST=127.0.0.1<br>
   DB_PORT=3306<br>
   DB_DATABASE=laravel  <-- your database<br>
   DB_USERNAME=root  <-- your username<br>
   DB_PASSWORD=  <-- your password<br>
4. run:
   "composer update"
   "php artisan serve"
5. goto http://127.0.0.1:8000


that is it.




