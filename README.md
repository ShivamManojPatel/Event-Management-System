# Event Management System

-------------------------------------
Description
-------------------------------------
A complete web-based **Event Management System** built using **PHP, MySQL, HTML, CSS, and JavaScript**.  
This system allows users to browse events, register for events, manage bookings, and make online payments.  
Admin users can manage events, view registrations, send emails, and control system content. 

-------------------------------------
Features
-------------------------------------
**User features**
- View upcoming events
- Event detail pages
- User registration & login
- Book event tickets
- Online payment integration
- Email confirmations

**Admin**
- Admin dashboard
- Add/Edit/Delete events
- View all bookings and user
- Manage event categories
- Send email notification
- Secure authentication

-------------------------------------
Technology used
-------------------------------------
Frontend
  - HTML5
  - CSS3
  - Bootstrap4
  - JavaScript

Backend
  - PHP

Database
  - MySQL

APIs
  - Stripe SDK
  - Paypal SDK
  - PHPMailer

UI Effects
  - Jquery
  - WOW.js
  - Waypoints
 
-------------------------------------
Payment Integration
-------------------------------------
Stripe API is currently integrated in the project. API is located inside user/payment/ folder. This project repository also includes Paypal SKD in case you want to configure that with project. Paypal SDK is located inside vendor/ folder.

-------------------------------------
Email Support and usage
-------------------------------------
This project used **PHPMailer**

Usage:
- Send booking confirmation
- Notify admin about new booking
- Handle contact form submissions

API is located inside PHPMailer/ folder

-------------------------------------
Software requirement
-------------------------------------
- Xampp
- Apache (webserver)
- IDE: Eclipse, NetBeans, or Visual Studio Code(Recommended)
- MySQL Workspace
- Any browser
- Libraries: Bootstarp, jquery, WOW.js, Waypoints.js, PHPmailer, Stripe, Paypal (Every library is included in project repository)

-------------------------------------
Setup instruction
-------------------------------------
**01. Clone the repository**
  command: git clone https://github.com/<your-username>/Event-Management-System.git

**02. Move project into server directory**
  Path: C:/xampp/htdocs/EventManagement

**03. Import the database**
  - Open PhpMyAdmin, link: http://localhost/phpmyadmin
  - Create new database
  - import: database.sql (Included in repository)

**04. Configure database connection**
  edit Datacon.php file and update the following:
  $servername = "localhost" (Do not change until your database is not on localhost)
  $username = "root" (Replace root with your username)
  $password = "" (Replace with your password)
  $dbname = "REMS" (Replace TEMS with your database name)

**05. Configure PHPMailer**
  Replace public key and private key for PHPMailer.
  Replace email address from which you want to send the email and replace password key with your password key with respective email.

**06. Run the project**
  Run your project on localhost
  Link: http://localhost/EventManagement/index.php

-------------------------------------
Future Enhancement
-------------------------------------
- User ticket download
- QR code ticket scanning system
- SMS notification
- Multi admin roles
- Improved analytics dashboard

-------------------------------------
Note
-------------------------------------
For more details about database design you should refer to Documentation.docx file.

-------------------------------------
Author
-------------------------------------
**Shivam Patel & Harsh Gandhi** <br>
Uka Tarsadia University | Babu Madhav Institute of Information Technology<br>

