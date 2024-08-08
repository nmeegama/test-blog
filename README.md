# Instruction to run blog site
This repository contains all the codes that I have written during my semester 3 D.S Using C course.


## Alternative 1
- Use the database backup file in the backups folder to restore the database
- Install node version 18
- Change teh directory to the root folder
- Now run `composer install` command
- Now change the directory to the `web/themes/custom/the_blog/`
- Now run the `npm install` command. This should install all node modules 
- Now run `gulp build` command to prepare the CSS and JS
- Now change to the root folder again
- rename the `web/sites/default/default.settings.db.php` file to `web/sites/default/settings.db.php`
- Change the DB credentials as needed
- You are good to go


## Alternative 2
- Install docker and ddev
- Change teh directory to the root folder
- Now run `ddev start` command
- Now run `ddev ssh` command
- Now run `composer install` command
- Now change the directory to the `web/themes/custom/the_blog/`
- Now run the `npm install` command. This should install all node modules
- Now run `gulp build` command to prepare the CSS and JS
- Now change to the root folder again
- EXIT the container (because you ran `ddev ssh`) byt typing `exit`
- Run `ddev import-db --file=backups/09-08-2024.sql` to restore the DB
- You are good to go


## User Credentials
- EDITOR user username : `editor`
- Admin user username : `blog_admin`
- User 1  username : `admin`
- Password for all users : `1qaz@WSX`

