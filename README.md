# Personalized Meal Ordering System

## Summary
The Personalized Meal Ordering System is a platform that allows users to order customized meals from local food vendors, providing a convenient and tailored solution for unique dining experiences. This readme provides instructions on setting up the environment, installing the project on other machines, and running the necessary commands to get the system up and running.

## Environment and Repository Setup
Clone the repository: 
    - HTTP:
```bash
https://github.com/Ronit-11/SERV.git
```
   - SSH: [git@github.com:Ronit-11/SERV.git]()
```bash
git@github.com:Ronit-11/SERV.git
```
   - GitHub CLI:
 ```bash
gh repo clone Ronit-11/SERV
``` 

Composer upgrade:
   - To ensure all PHP dependencies are installed and up to date.
```bash
composer upgrade
```

Install MySQL database:
   - Follow the instructions provided by MySQL to install the database on your machine.

Import the MySQL database:
   - Use the provided SQL file to import the database schema and initial data.

Run database migrations:
   - Execute the following migration command to set up the database.
```bash
php artisan migrate:fresh --seed
```

Run NPM:
   - To install Node.js dependencies for the project.
```bash
npm install
npm run dev
```

## Installing and Starting the Project
1. Install dependencies:
   - Make sure Node.js and NPM are installed on your machine. If not, you can download them from the official Node.js website: [https://nodejs.org](https://nodejs.org).

2. Navigate to the project directory:
   - Open your terminal and change the current directory to the project folder: `cd Serv`

3. Start the project:
   - Use the appropriate command to start the project, depending on the specific setup and requirements of your project.

## Dependencies
- Node.js and NPM: [https://nodejs.org](https://nodejs.org)
- MySQL Database: [https://www.mysql.com](https://www.mysql.com)
- laravel: [https://laravel.com/docs](https://laravel.com/docs)
- laravel jetstream : [https://jetstream.laravel.com/3.x](https://jetstream.laravel.com/3.x)

**Note:** Ensure that you have the necessary access rights and credentials to set up and configure the database and dependencies for the project.

By following these guidelines and executing the provided commands, you will be able to set up and start the Personalized Meal Ordering System on your local machine. For any further assistance or troubleshooting, please refer to the documentation or contact the project's maintainers.
