# 💰 Expense Management System - Local Setup Guide

Welcome to the **Expense Management System**! This guide is designed specifically for non-technical users to help you set up and run this application on your local computer.

Follow these simple, step-by-step instructions, and you'll have the system running in no time!

---

## 📋 Prerequisites

Before we start, you will need to download and install a software package called **XAMPP**. XAMPP is a free, safe program that bundles everything needed to run this application (a web server and a database) on your computer.

1. **Download XAMPP:**
   * Go to the official website: [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html)
   * Download the version for your operating system (Windows is recommended for this guide).
2. **Install XAMPP:**
   * Run the downloaded installer.
   * Click **Next** on all prompts (the default settings are perfect).
   * Finish the installation.

---

## 🚀 Step-by-Step Installation

### Step 1: Copy the Project Files
1. Locate the folder of this project (named `Expense-Management-System`).
2. Copy this entire folder.
3. Paste the folder into the XAMPP web directory:
   * **Windows:** Go to `C:\xampp\htdocs\` and paste it there.
   * **Mac:** Go to `/Applications/XAMPP/xamppfiles/htdocs/` and paste it there.
   
> [!NOTE]
> The final path of the project folder should look like: `C:\xampp\htdocs\Expense-Management-System\`

---

### Step 2: Start the Servers
1. Open the **XAMPP Control Panel** (you can search for it in your Windows Start menu or Mac Applications).
2. Look for **Apache** and **MySQL** in the list.
3. Click the **Start** button next to both of them.
4. They should turn green, indicating they are running successfully.

---

### Step 3: Setup the Database
1. Open your web browser (like Google Chrome, Edge, or Safari).
2. Go to this address: [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/)
3. Click on the **Import** tab at the top of the page.
4. Click the **Choose File** button.
5. Navigate to your project folder (`C:\xampp\htdocs\Expense-Management-System\`) and select the file named `database.sql`.
6. Scroll down to the bottom of the page and click the **Import** (or **Go**) button.
7. You should see a success message saying the database was imported successfully.

---

### Step 4: Open the Application
1. Open a new tab in your web browser.
2. Go to the following address:
   👉 **[http://localhost/Expense-Management-System/public/](http://localhost/Expense-Management-System/public/)**
3. You will be greeted with the Login page!

---

## 🔑 Login Credentials

Use the following default account details to log in to the system:

* **Email:** `admin@arabapps.com`
* **Password:** `123456`

---

## ❓ Troubleshooting & FAQs

### 1. I get a "404 Not Found" error when opening the page.
* Double-check that your project folder is named exactly `Expense-Management-System` and is placed inside the `htdocs` folder.
* Ensure you visited `http://localhost/Expense-Management-System/public/` (don't forget the `/public/` part!).

### 2. Apache or MySQL won't start (won't turn green).
* **For Apache:** This is usually because another program (like Skype or Zoom) is using the same port. Try closing those programs and starting Apache again.
* **For MySQL:** Restart XAMPP Control Panel as an Administrator (right-click -> Run as Administrator) and try starting it again.

### 3. I get a database connection error.
* Make sure MySQL is running in the XAMPP Control Panel (it should be green).
* Check that you successfully imported `database.sql` in Step 3.
