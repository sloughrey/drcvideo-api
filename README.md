# DRC Video / Dancebug API

### Stack:
  - PHP 7.2.2
  - MySQL 5.7.14
  - Laravel Lumen 5.6
  - Bootstrap 4 (includes jQuery as a dependency)
  - HTML
  - CSS
  - Javascript
  - Composer
  
### Laravel Lumen Requirements:
- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension

### Features:
  - API versions for easy upgrades and legacy support
  - User validation
  - MySQLi db connector used, as requested.
  - Resource management
  - Appropriate response headers / status codes
  
### API Routes:
  - GET to dev.drcapi.com/v1/users - Returns a collection of all users
  - POST to dev.drcapi.com/v1/users - Creates a new user
  - GET to dev.drcapi.com/v1/users/id - Shows a user given a numeric ID




### Install steps:

1) git clone https://github.com/sloughrey/drcvideo-api.git

2) composer install

3) Copy the .env file, that was sent in my project submission email, into the project root directory (Do not worry about updating these config values).

4) Create a database called 'dancebug' as well as a user called 'dancebug' with a password of 'dancebug' and give the user permission to the dancebug database:
	- `CREATE DATABASE dancebug;`
	- `CREATE USER 'dancebug'@'localhost' IDENTIFIED BY 'dancebug';`
	- `GRANT ALL PRIVILEGES ON dancebug . * TO 'dancebug'@'localhost';`
	- `FLUSH PRIVILEGES;`
##### Note: If you are not using the same database credentials as below, you will need to update the App/Database.php file with the new credentials.
	
5) Create the tblstudios table and populate with some data:

`CREATE TABLE tblStudios (
	DancerID INT(11) AUTO_INCREMENT,
	StudioName VARCHAR(100) NOT NULL,
	StudioID INT(11) UNSIGNED NOT NULL, 
	FirstName VARCHAR(100) NOT NULL,
	LastName VARCHAR(100) NOT NULL,
	Gender VARCHAR(20) NOT NULL,
	DOB DATE NOT NULL,
	DateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (DancerID)
);`

`INSERT INTO tblStudios (StudioName, StudioID, FirstName, LastName, Gender, DOB)
VALUES 
('Stars Dance Academy', 5112, 'Alexis', 'Stephens', 'Female', '2012/03/10'),
('Stars Dance Academy', 5112, 'John', 'Snow', 'Male', '2011/7/11'),
('Edge Dance', 3215, 'Riley', 'O\'Shaughnes', 'Female', '2007/12/10');`

6) Either run the local built in PHP server or configure your web server to handle the site

Within the root project directory run: php -S localhost:8000 -t public/

OR

Apache Instructions
Add this to your vhosts server config:


`<VirtualHost *:80>
  ServerName dev.drcapi.com
  ServerAlias dev.drcapi.com
  DocumentRoot "path/to/public/folder"
  <Directory  "path/to/public/folder">
        AllowOverride All
        Require local
  </Directory>
</VirtualHost>`

Then add this to your host file:  

127.0.0.1 dev.drcapi.com


7) Enjoy!

### How to Use:
- Visit the index.php page for a web version that consumes the API
- Simulate requests using Postman or preferred tools

#### If you have any questions or issues that arise during the installation don't hesitate to contact me!


