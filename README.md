# examcompanion
MCQ based digital examination system

---

#### System Requirements
- Apache Server
- PHP 7+
- MySQL 5+
- MySQL gui client for easy access eg: phpmyadmin
- Any text editor for customization
- Browser (Firefox, Chrome, Edge etc.)


#### Database Setup
Create a database named *examcompanion* or anyother of user's choice. Open the database directory which contains a sql file.
Select your database and either copy this code in the sql file and paste in a sql editor and execute or directly import the sql fie in the database.

#### Application Setup
Upload all the files and directories in the document root of your server using any FTP client. Maintain the directory structure properly. User can skip uploading the database directory as it only contains the database structure for database setup.

#### Connecting the Application to database
Once uploading is done open the *linkDB.php* file. Specify the values for corresponding variables. Save and update it in the docuemnt root of the server.

#### Setup in Linux Shared Hosting using cPanel
- Login to the **cPanel** and click on the **PHP PEAR Packages**.
- Type zip in the search bar and **Archive_Zip** will be available. Click on the install icon.
- After installing **Archive_Zip** go back to **cPanel** and click the **Select PHP Version**.
- Now, the **Zip** or **Archive_Zip** is visible here. Click the checkbox of the zip extension and hit the save button to add the **Zip** or **Archive_Zip** to the current PHP version. This would install the PHP Zip extension.
- Login to the cPanel through SSH and run the command: **$composer require phpoffice/phpspreadsheet**

#### Access the Application
For the first time access the application url eg:
- localhost (end user access)
- username `bishalnandi1996@gmail.com`
- password `bishal`

**For any techncal issue contact**
[BISHAL](https://www.linkedin.com/in/bishalnandi1996/)
