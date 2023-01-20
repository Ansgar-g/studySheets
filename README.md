# studySheets
This will be a backup for my website where you can upload study sheets.

The uploaded files are edited in no way other than that I have removed the username and password to my mySql account. 

## what this project is about
essentially, this project is about making a website where learning notes can be uploaded. Special focus will be put on the fact that you can search for learning notes according to the country, (the state), the school and other aspects.

So far I have implemented the scripts for registration and login. after being redirected to the profile, you can upload a learning note at "upload" or search for a learning note at "search". When searching, you can also use filters to find learning notes from your own region or school. 

## what each file does
#### index.php:
This is the main file where the user is located during registration and login. this file contains only html, but uses other files that contain php. 

#### index.css:
This is the stylesheet for index.php

#### register.php:
This is the file that makes an entry into the database if the username entered is not already taken. 

#### login.php:
This is the file that checks if the username and password entered match. If this is the case, the start page is displayed. This file will be extended.

#### show.php: 
Diese Dateie zeigt einfach alle einträge derDatenbank. 

