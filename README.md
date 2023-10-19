# cashout-calculator
A simple web app to calculate my nightly cashouts as a server. Built in PHP with Tailwind CSS.

## Overview:
As a server/bartender at St. Augustine's Craft Brew House on Commercial Drive in Vancouver, part of every shift is my end-of-shift cashout: calculating what portion of my tips I have to tipout to the host, kitchen, and if I'm serving, to the bartender. What initially started out as a very simple little tipout calculator turned into a larger scale web app designed to accept all varying factors of a shift, calculate it all, and give detailed feedback.
The Cashout Calculator was built using good-old-fashioned PHP, though I decided to style it using TailwindCSS.

## Installation Instructions
### Set up a database
First, create a database within your MySQL server. In this database, run the following command to create a table for use by the calculator. Note: Make sure to replace <YOUR_DB_NAME> with your database's actual name.
```SQL
CREATE TABLE `<YOUR_DB_NAME>`.`cashouts` (`primary_key` INT NOT NULL AUTO_INCREMENT , `empid` INT NOT NULL , `date` DATE NOT NULL , `netSales` DECIMAL(7,2) NOT NULL , `foodSales` DECIMAL(7,2) NOT NULL , `tipout` DECIMAL(7,2) NOT NULL , `tipsPaid` DECIMAL(7,2) NOT NULL , `tipsActual` DECIMAL(7,2) NOT NULL , `tipPercent` DECIMAL(4,2) NOT NULL , `cashReported` DECIMAL(7,2) NOT NULL , `cashActual` DECIMAL(7,2) NOT NULL , `estRemit` DECIMAL(7,2) NOT NULL , `netTransfer` DECIMAL(7,2) NOT NULL , PRIMARY KEY (`primary_key`)) ENGINE = MyISAM; 
```

Then in the root project directory for the Cashout Calculator, create a file called "dbinfo.php", and add to it the following contents:
```php
<?php
const DB_HOST		= "<your_host_server>"; //	<-- add your MySQL server name here
const DB_USER		= "<your_db_user>";	//      <-- add your MySQL username here
const DB_PASS		= "<your_db_pass>";	//      <-- add your MySQL password here
const DB_NAME		= "<your_db_name>"; //      <-- add your MySQL database name here
?>
```

### All Done!
Once that is complete, you should be able to open cashout-calculator on your local server and have it be fully functional. Feel free to let me know if you find any bugs!

## What I Learned
Cashout Calculator was a project initially intended to just be functional, but it ended up being a thorough refresher in PHP, and a great way to build experience using TailwindCSS. I learned a bit about formatting for MySQL servers, about switching pages using the header function in PHP, and got a lot of rote practice in using Tailwind.

## What Comes Next
As a project, I'm planning on expanding the calculator more in the future - I'd like to include the ability to create profiles based on Employee ID, so that you can only submit a cashout if you are already registered in the database, and I'm going to completely overhaul the styling to give it a clean, modern UI.
My plan after doing those small improvements is to base my next project as an extension of this one: I want to use a modern JS framework to build a full-stack dashboard UI that will allow users to view their full statistics over time. I've been meaning to learn Express.js for a while, and I think this would be the perfect opportunity to begin learning how to build a back-end.

## Portfolio Link
If you think this project was neat, feel free to see some of my other work on my portfolio:
https://www.crf-dev.ca/
