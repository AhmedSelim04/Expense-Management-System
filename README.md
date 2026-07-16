# Expense Management System (PHP MVC)

A lightweight, secure, and clean **Expense Management System** built using **Native **PHP**** following the **Model-View-Controller (**MVC**)** architectural pattern.

---

## Features

- **Full **CRUD** Operations:** Add, view, edit, and delete expenses.
- **Smart Filtering:** Filter expenses by search keyword, category, and date range.
- **Secure Architecture:** Built with prepared statements (**PDO**) to prevent **SQL** Injection and input validation to stop **XSS**, future-date entries, and **URL** tampering.
- **Responsive UI:** Clean dashboard styled with **Bootstrap 5** and **FontAwesome** icons.
- **User Authentication:** Protected routes with session management to isolate users' data.

---

## Project Architecture

```text Expense-Management-System/ ├── app/ │   ├── configs/ │   │   └── database.php      # **PDO** Database Connection │   ├── models/ │   │   ├── user.php          # User authentication queries │   │   └── expense.php       # Expense **CRUD** & filter logic │   ├── controllers/ │   │   ├── login-action.php │   │   ├── logout-action.php │   │   ├── create-action.php │   │   ├── edit-action.php │   │   └── delete-action.php │   └── views/ │       ├── login.php         # Login Page │       ├── index.php         # Dashboard & Filters │       ├── create.php        # Add Expense Form │       └── edit.php          # Edit Expense Form ├── public/ │   └── index.php             # Core Router & Security Middleware └── database.sql                 # database file
```
Step-by-Step Local Setup with **XAMPP** Follow these simple steps to install **XAMPP** and run this project on your machine. ## Download & Install XAMPP Download the installer for your OS (Windows or Mac) from the official website: apachefriends.org. Run the installer, click Next through all the steps, and finish the installation using the default path (usually C:\xampp on Windows).

## Start XAMPP Control Panel

Open the **XAMPP** Control Panel from your Start menu. Click the Start button next to Apache. (The background labels for both will turn green, indicating they are running successfully).

## Download and Move Your Project to htdocs

Download your project folder (if it downloaded as a .zip file, right-click and extract/unzip it first). Go to this folder on your computer: C:\xampp\htdocs\ Move or copy your extracted project folder (Expense-Management-System) directly into that htdocs folder.

## Import the Database

Open your web browser and go to: [http://localhost/phpmyadmin](http://localhost/phpmyadmin) Click on **SQL** in the top navigation bar. (This automatically creates the expense_db database, sets up the tables, and inserts sample data).

How to Run on Any Port If your default port (80) is blocked by other software, or you just want to run it on a custom port (like **8000** or **8080**), you have two simple options: Option A: Using **PHP**'s Built-In Server (Easiest) You don't even need to configure Apache settings. Just use your terminal: Open your terminal or Command Prompt. Bashcd C:\xampp\htdocs\Expense-Management-System Bashphp -S localhost:**9000** -t public Open your browser and go to: [http://localhost:**9000**](http://localhost:**9000**)

Option B: Changing Apache's Port in **XAMPP** If you want Apache to serve your website on a custom port (e.g., **8080**): Open the **XAMPP** Control Panel. Click the Config button next to Apache, and select Apache (httpd.conf). Search (Ctrl + F) for the word Listen. Change Listen 80 to Listen **8080** (or your preferred port number). Search for ServerName localhost:80 and change it to ServerName localhost:**8080**. Save and close the file, then Restart Apache in the Control Panel. [http://localhost:**8080**/Expense-Management-System/public/index.php](http://localhost:**8080**/Expense-Management-System/public/index.php)

### Security Measures Implemented

Future Date Prevention: Expenses cannot be logged with a date ahead of today. Strict **URL** Validation: Filter values, categories, and date structures passed via URLs are fully sanitized to prevent tampering. Isolated Data Access: Users can only view, edit, or delete expenses belonging strictly to their own accounts.
