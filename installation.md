## Introduction

If you are seeing this, then you have already cloned the docs repository from
bitbucket

## First Things First

1. Create a filed called: .env in the docs folder, the docs folder is 
the root folder of this application.

2. Look for a file called .env.example in the docs folder. seen it??

3. Copy the contents of the .env.example filed into the .env file you just created.

4. Replace the following literal constants in your .env file with the ones that
   you use for your local database connections:
   
   DB_DATABASE=docs
   DB_USERNAME=docs_user
   DB_PASSWORD=docs_password
 
5. Run the following command in the terminal:
   
   composer install  //(This will install the dependencies in the composer.json file)
      
6. After the above command has finished, run the following command:
      
   php artisan migrate --seed //(This will create the application database tables, also any seed data
    will be created)
         
7. After the above command has finished, run the following command:
         
   php artisan key:generate //(This will update the APP_KEY constant in your .env file
   NB: Always restart your application after running the above command, especially if
   you had run php artisan serve before running this command
            
8. Run the following command to start your application:
    
   php artisan serve //(you will see something like this:  
   Laravel development server started on http://localhost:8000/
   
   open the link that looks like http://localhost:8000/ in your browser to see the
   application working

9. Thank you.
   

            
            
   
