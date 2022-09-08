# how to Use The system
## step 1:
### start Xampp apache and mysql
- 1.on xampp folder, past Electronics floder on htdocs folder
- 2. on the the browser enter:http://localhost/phpmyadmin/

- 2.create database electronics
- 3.import file electronics.sql
## project is live and running on heroku
The system is running and hosted on 000web.
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

## project is live and running on heroku
The system is running and hosted on 000web.
### project Link
- username: test
- password: 1111
#### please note that test user is super user of the system after login with this creditials you will be granted all system privilages
- clients site of the system
  
  https://boiling-earth-35730.herokuapp.com/
  
- sales support site
  
  https://boiling-earth-35730.herokuapp.com/secret

- manager site
  
  https://boiling-earth-35730.herokuapp.com/manager
  

## System Description for Visualization of Data

While working with the dataset, I used  Matplotlib, tabulate and Seaborn to visualize particular information from the dataset. The System has a manager site, where I analyze insurance sales and visualize them in form of graphs such as bar charts and piecharts. The managers are enabled to download the charts in many different forms such as images and Microsoft Excel.  It has sales support site where the sales support are enabled to import and export the data in different formats such as CSV, SQL and Microsoft Excel

## Transparency of Data

The fraud detection part of the system is specifically detecting whether the claim is fraudulent or legitimate while the client claiming for their benefits during an incident. So far the system is enabled to detect whether the claim is fraudulent or legitimate and report or revealed it to the sales support team of the insurance. 

## Main Working Functionality of the System

- Registaring of clients using social apps google
- Two factor authentication using google authenticator and Twillio
- Subscribing for policy and payements with Stripe
- Make claims online 
- fraud Detection
- policy sales analysis and visualizing of them in barcharts and piecharts



## Goals of the System
My goal is to build a fully functioning system that will allow clients to subscribe for policy online.The system suppossed to verify whether the clients are whom they claim they are while registaring and claiming for their benefits using deep learnig algorithms. To buid the system that will predict what will be the sales of policy in comming weeks,months or even years. The system will have recommendations functionality

## Recommendations

My recommendation to everyone in the field of analysing data from large Datasets is to follow CRISP-DM  Techniques while working with large and complicated datasets.

## How to Run Project locally

To get started please ensure that python 3.8 or above is installed in your system

- Create a project directory
  ```
  mkdir projectfolder
  ```

- go to project folder
  ```
  cd projectfolder
  ```

- Create virtual environment
  ```
  python -m venv env
  ```
- Activate the virtual environment
  ```
  source env/bin/activate
  ```
- Then clone the project
  ```
  git clone https://github.com/LomNtetha/fraudDetection.git
  ```
- go to project directory
  ```
  cd fraudDetection
  ```

- Install requirements file
  ```
  pip install -r requirements.txt
  ```
- Apply any migrations mistakenngly unapplied
  ```
  python manage.py makemigrations
  ```
- migrate Database
  ```
  python manage.py migrate
  ```

- Create super user
  ```
  python manage.py createsuperuser
  ```

- Collect static folder
  ```
  python manage.py collectstatic
  ```
- Compress the static folder for betterment of website perfotmance
  ```
  python manage.py compress --force
  ```
- run the project
  ```
  python manage.py runserver
  ```
## How to push the project on cloud Heroku PAAS

Ensure that  heroku cli and git are installed on your system

on project directory
- Run The following command and heroku will automatically create project name for you
  ```
  heroku create
  ```

- add all files you need to pust to Heroku
  ```
  git add .
  ```

- commit changes with some comments
 ```
 git commit -m "My comments"
 ```
     
- Ensure that new heroku projet repostory link  are listed (they will be 4 links including of github)
  ```
  git remote -v
  ```

- push the project to heroku
  ```
  git push heroku master
  ```

- Create migrations and super user
  ```
  heroku run python manage.py migrate
  ```

  ```
  heroku run python manage.py createsuperuser
  ```

- open the project
  ```
  heroku open
  ```
In this stage the project will fail to open becuase configuration process are not yet done,so lets continue.

 To use postgresql on heroku we must ensure that postgresql is availble on our heroku oddons 

 - run the command below , it will list oddons available including heroku-postgresql
  ```
   heroku addons
  ```
- open postgresql oddons
  ```
  heroku addons:open heroku-postgresql
  ```

- check configarion variables. we must configure our secret keys so that they can not be exposed to hackers
- this command will list all secret keys and our variables that are configured
  ```
  heroku config
  ```
- then set all of your variables secret keys like this:
 ```
  heroku config:set DJANGO_SECRET_KEY="pleaseenteryourowndjangosecretkey"
  ```
- Then set for debug to false
  ```
  heroku config:set DJANGO_DEBUG=False
  ```
- go to your settings and change allow host to something like this please use your own heroku app name
ALLOWED_HOSTS = ['https://boiling-earth-35730.herokuapp.com/','boiling-earth-35730.herokuapp.com', '127.0.0.1']

-Then save your settings and commit them to your GitHub repository and to Heroku:




