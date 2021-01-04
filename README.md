# camagru
This is my first web project from wethinkcode that I did individually. I went about the procedural way rather than the object oriented way of programming. To develop this I had to use html, php, mysql, javascript and Apache XAMPP/MAMP. The task was to develop a webapp that will allow users to sign up, login, post pictures online to show off to the rest of the world and they can be able to comment, like and get notified if their picture was commented on their pictures. I had to make users have an option to update the profile, change their email, username or password.
# Requirements tools to use
* A MySQL instance, eg. Xampp or Mamp
* PHP (pre-installed with Xampp or Mamp)
* HTML
* CSS
* JavaScript
* __For editing ONLY: a text editor, eg. VS Code__

# The project should contain imperatively:

* A index.php file, containing the entering point of the site and located at the root of the file hierarchy.
* A config/setup.php file, capable of creating or re-creating the database schema, by using the info contained in the file config/database.php.
* A config/database.php file, containing the database configuration, that will be instanced via PDO in the following format:

DSN (Data Source Name) contains required information needed to connect to the database, for instance mysql:dbname=testdb;host=127.0.0.1. Generally, a DSN is composed of the PDO driver name, followed by a specific syntax for that driver. For more details take a look at the PDO doc of each driver1.

# Testing
WeThinkCode_'s marking sheet can be found [here](https://trello-attachments.s3.amazonaws.com/5b838d66f253fc021a40201e/5b838d66f253fc021a402050/e5a609badea18ede3def82f4043c96e6/camagru.markingsheet.pdf)

### Tests that are executed:
1. Preliminary checks, used PHP, no external frameworks (aside from css), config files in the correct location. Used PDOs
2. Webserver starts
3. Create an account
4. Log in
5. Capture a picture with the webcam
6. Add sticker
7. Visit gallery
8. Change user credentials
9. Upload a picture

### Expected outcomes:
1. Backend code written in PHP
2. No frameworks used (aside from css)
3. database.php + setup.php in the config folder
4. Used PDOs
5. Web server starts on localhost
6. Able to register
7. Able to log in
8. Able to capture photos
9. Able to visit gallery
10. Able to change credentials
