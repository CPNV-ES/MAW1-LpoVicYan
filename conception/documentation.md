# Exercise Looper Documentation

Welcome to the official documentation of our own version of ExerciseLooper for the module MAW

## Conceptual Data Model

![ExerciseLooper CDM](https://github.com/CPNV-ES/MAW1-LpoVicYan/blob/main/conception/MCD.png)

## Logical Data Model

![ExerciseLooper LDM](https://github.com/CPNV-ES/MAW1-LpoVicYan/blob/main/conception/MLD.png)

## Building the environment

### Prerequisites

* PHP - minimum version 8.1.9
  * You will need to edit the **php.ini** file in order to activate the extension `extension=pdo_mysql`.

* MySQL or MariaDb
  * You will need the last version of MySQL or MariaDb in order to create the database in your local environment.
  * Our [database script](https://github.com/CPNV-ES/MAW1-LpoVicYan/blob/main/conception/exercicelooper.sql) is located in the **conception folder**.

* Composer
  * You will need to it to install the repository dependencies.
  * You can get it from their [website](https://getcomposer.org/)

* IDE or text editor of your choice
  * During the project development, our team choice was Visual Studio Code with PHP extensions but you can use an IDE like PHP Storm.

### Build Procedure

1. Get the [repository](https://github.com/CPNV-ES/MAW1-LpoVicYan) from GitHub.
   * Download as a zip or `git clone https://github.com/CPNV-ES/MAW1-LpoVicYan.git` in a terminal (You need to have Git in your computer to do this).

2. If not done yet, execute the database script to create the database
   * As mentioned in [Prerequisites](#Prerequisites) section.

3. From your terminal based in the folder `src`, execute the following command to install the repository dependencies.

   ```bash
   composer install
   ```

4. Edit `.const.php.example` file in **src/models** folder with your own database credentials and save it as `.const.php`

5. From your terminal based in the repository, execute the following command to initiate a local PHP server.

   ```bash
   php -S localhost:8000 -t public
   ```

6. Open the [http://localhost:8000](http://localhost:8000) from your browser

## Repository Folder Structure

* **conception/** Contains every file related to the database.

* **public/** Contains the project index and the project resources (images, css, js).

* **src/** Contains all the project files
  * **controllers/**
    * Contains all the project controllers.
  * **models/**
    * Contains all the class files and .const file example that will contain the database credentials.
  * **views/**
    * Contains all the project views.
  * **vendor/**
    * Folder generated by the command `composer install`, it contains the project dependencies.

## Project Logic

### MVC Structure

The project follows the MVC (Model, View, Controller) structure. This allows to separate the code into those 3 themes and keep the folder organized and easy to work-on.

### Models

This folder contains a file for each class of the database, three in our case.

Each class have is own functions and attributes, but have some common ones that look the same or almost the same.

Those functions are the link between the controller files and the database, if a controller need some information from an object, to create, update or even delete one, it surely passes through a model.

### Controllers

This folder contains a folder for each class of the project.

A new controller is created every time a class as a different interaction with a view file.

### Views

This folder contains a folder for each class of the project and one for the site functions.

A view is often given by a controller but somethings it can come directly from the dispatcher.

### Routes

All the project routes are store in the dispatcher file inside the controllers folder.
