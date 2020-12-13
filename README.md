# DDWA Assignment 1 (CMS)

This project about creating a CMS and Database for IMGD Resource Library (IRL)

## Design Process
 
This is a CMS for a school database and I think it should look professional and simple to use so that the users can find and view what they want easily.

For Administrator:
- Able to view software details, notebook details, student particulars, a list of projects and lecturer details.

For Lecturer:
- Able to view the different projects they that are supervising and the amount of spend time supervising each project.

For Student:
- Able to view the different projects that are being assigned to them.

## Existing Features

For Administrator:
- Manage Projects
    - Able to delete and add projects

- Manage Software
    - Able to delete software

- Manage Lecturer
    - Able to view lecturers information

 - Manage Notebook
    - Able to delete and add notebook
    - Able to choose software to install on a notebook

 - Manage Student
    - Able to view students information


For Lecturer:
- Personal Details
    - Able to view their own particulars

- Project Supervising
    - Able to see the project that he/she is supervising


For Student:
- Personal Details
    - Able to view their own particulars

- Project Supervising
    - Able to see the project that he/she is being assigned to

### Features in the future

Features that I would like to implement in the future:

- Able to add a full CRUD for all pages in administrator.

- Add a report page to show all the list of details within a page.

- Add proper validation for pages like add project, add notebook.

## Technologies Used

- [XAMPP](https://www.apachefriends.org/index.html)
    - The project uses **XAMPP** to build site offline on a local host server

- [MySQL](https://jquery.com)
    - The project uses **MySQL** for database management system and writing queries where ever necessary


- [PHP](https://www.php.net/)
    - The project uses **PHP** to be used in different database languages like MySQL


## Testing

For any scenarios that have not been automated, test the user stories manually and provide as much detail as is relevant. A particularly useful form for describing your testing process is via scenarios, such as:

1. Login: (Administrator, Student and Lecturer)
    1. Go to the "Index" page.
    2. Try to login without entering any information entered and verify that a relevant error message appears.

2. Install Software on Notebook: (Admin)
    1. Go to the "Manage Notebook" page.
    2. Try to select a laptop and the software to install and the software name should reflect on the notebook.

3. Add a Notebook: (Admin)
    1. Go to the "Manage Notebook" page and click on "Add Notebook".
    2. Type the information accordingly and it should appear in the "Manage Notebook" page.

4. Delete a Notebook: (Admin)
    1. Go to the "Manage Notebook" page and click on "Delete" on any of the notebook.
    2. The notebook details should be deleted.

5. Add a project: (Admin)
    1. Go to "Manage Project" page and click on "Add Project".
    2. Type the information accordingly and it should appear in the "Manage Projects" page.

6. Delete a project: (Admin)
    1. Go to the "Manage Notebook" page and click on "Delete" on any of the notebook.
    2. The project details should be deleted.

Problems 

Did not do proper validation for these pages

- "Add Projects" page is able to submit even when no information is typed
- "Add Notebook" page is able to submit even when no information is typed

### Login Details

For Administrator:

- Username: admin123
- Password: password123


For Lecturer:

- Username: staff123
- Password: password123


For Student:

- Username: S100000
- Password: password1234

## Specifications

Software:
- XAMPP
- Google Chrome
- VS Code

Operating System:
- Windows 10

Hardware:
- Keyboard
- SSD/HDD (500GB)
- Intel core i5
- Touchpad


## Credits
https://www.tutorialrepublic.com/php-tutorial/php-mysql-select-query.php

https://www.youtube.com/watch?v=gnkI7hIC2RU&t=154s

https://getbootstrap.com/

