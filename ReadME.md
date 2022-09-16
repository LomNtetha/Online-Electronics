# Electonics Mangement E-commerce System
 https://lodetxelectronics.000webhostapp.com/

This is an e-commerce  PHP PDO based system that sells products online, the system
selling Electronics accessories. It provides the user with a catalog of different product available for purchase in the store. In order to facilitate online purchase a shopping
cart and checkout are provided to the user to make purchase online using different
payement method.  The implementation technologies are PHP PDO, JQUERY,
BOOTSTRAP, HTML5, relational databases (such as MySQLi).
# maintenance announcement
The system is still experiencing some issues due to php session. This system is working very well on localhost but now on 000webhost gives some errors caused by session. I hope i will find solution very soon

## How to buy products online (demonstration by Screenshots)
- The client site landing page
![alt text](https://github.com/LomNtetha/Online-Electronics/blob/master/screenshots/Screenshot%20(229).png?raw=true)

- click on products you wish to buy
![alt text](https://github.com/LomNtetha/Online-Electronics/blob/master/screenshots/Screenshot%20(230).png?raw=true)

- You can also categorize products by its category, Manufacture, Brand,Price and color
![alt text](https://github.com/LomNtetha/Online-Electronics/blob/master/screenshots/Screenshot%20(260).png?raw=true)


- Review products photos, Description, features, customers reviews and add the products to card or whishlist
![alt text](https://github.com/LomNtetha/Online-Electronics/blob/master/screenshots/Screenshot%20(232).png?raw=true)

![alt text](https://github.com/LomNtetha/Online-Electronics/blob/master/screenshots/Screenshot%20(259).png?raw=true)

- click on the cart to see total number of products added. (Cart shows total number of products added NOT total number of items added)
![alt text](https://github.com/LomNtetha/Online-Electronics/blob/master/screenshots/Screenshot%20(234).png?raw=true)

- Click proceed to checkout 
![alt text](https://github.com/LomNtetha/Online-Electronics/blob/master/screenshots/Screenshot%20(236).png?raw=true)

- fill billing address and Select method of payment
![alt text](https://github.com/LomNtetha/Online-Electronics/blob/master/screenshots/Screenshot%20(242).png?raw=true)

- if I select paypal this how it goes
![alt text](https://github.com/LomNtetha/Online-Electronics/blob/master/screenshots/Screenshot%20(243).png?raw=true)

- Customer profile
![alt text](https://github.com/LomNtetha/Online-Electronics/blob/master/screenshots/Screenshot%20(246).png?raw=true)

## How to manage products, orders and customers on admin Panel(demonstration by Screenshots)
- This is admin panel dashboard landing page after login
![alt text](https://github.com/LomNtetha/Online-Electronics/blob/master/screenshots/Screenshot%20(252).png?raw=true)

- This is products list in tables, you can search ,delete, update and create products
![alt text](https://github.com/LomNtetha/Online-Electronics/blob/master/screenshots/Screenshot%20(253).png?raw=true)

- create products
![alt text](https://github.com/LomNtetha/Online-Electronics/blob/master/screenshots/Screenshot%20(254).png?raw=true)

![alt text](https://github.com/LomNtetha/Online-Electronics/blob/master/screenshots/Screenshot%20(255).png?raw=true)



## step 1:
### start Xampp apache and mysql
- 1.on xampp folder, past Electronics floder on htdocs folder
- 2. on the the browser enter:http://localhost/phpmyadmin/

- 2.create database electronics
- 3.import file electronics.sql
## project is live and running on 000webhost
The system is running and hosted on 000webhost.
## step 2
### Customer panel
- 1.on the the browser enter: https://lodetxelectronics.000webhostapp.com/
- customer creditials
- Email:admin@gmail.com
- Password:Test@123

## Step3 
### Admin Panel
- 1.on the the browser enter: https://lodetxelectronics.000webhostapp.com/site_admin/login.php
- admin creditials
- Email: admin@gmail.com
- Password: admin123

## How to hotst the php project on 000webhost
- create a webhost account here:https://www.000webhost.com/
- verify you account
- click create first website or build website
- go to Website Manager then click File Manager
- zip your project and upload it as a zip file
- click on Upload your files button
- make sure that your zip file is in public_html folder

After the file has been uploaded we will need to extract the zip file
### how to Extract the project
#### 1st Method
- Right click on the project file
- select extract and name the destination folder as . so that they can be on public_html folder
- the file will be extracting to the public_html

if the folder or not on public_html won't work, Make sure that your file and folder are moved to public_html.

#### 2nd Method
- Download unzipper here: https://github.com/ndeet/unzipper
- Extract the folder on your local machine
- Upload unzipper files in public_html folder
- after uploading all the files…you just need to visit yoursite.com/unzipper.php 
- Now Select the zip and click “Unzip Archive”
- you can visit your public_html folder, your files are now extracted.
- you can delete unzipper files and your unzip folder

## How to connect to database
- go to Website Manager, then click Database Manager
- Then enter your Database Name, Database Username, and Password
- Manage database using phpmyadmin
- go to Import. In here, upload your SQL dump
- Then, go to your public_html folder->core->database
- open the file and edit database name,password and username(host:localhost)
- save and close the editor then refresh the site it must be working correctly.