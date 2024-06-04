# Project Red Properties

## Description
This is a Drupal iteration of a classifieds app for local properties on PEI.

This project implements a Drupal CMS installation as a front end and content management system. It connects to a MySQL service for database management.

Docker compose is used to orchestrate the building of and connection between the services (or containers in the docker world).

## Requirements
* [Docker Compose](https://docs.docker.com/compose/install/)

## Running the Site
1. After installing docker compose, open a terminal or powershell (PC)
2. Navigate to the project folder/directory
3. Type `docker compose up`
4. After running this, you can open your internet browser and navigate to localhost:8085 to access the drupal installation
5. Initially, you will be taken to the [installation wizard](https://www.drupal.org/docs/user_guide/en/install-run.html)
6. On the "Database configuration" step, ensure the following is entered for the database credentials:
* *Database name*: redproperties
* *Database username*: user
* *Database password*: password
* Expand the *Advanced options* dropdown and enter redproperties_db as the Host
* Remember the username and password you choose for the Site Maintenance Account. This is akin to the webmaster account (a super user)
7. When you are completed working for the session, you can release your resources by holding CTRL + C in the terminal or powershell where you ran `docker compose up`. You can also close this terminal or powershell.