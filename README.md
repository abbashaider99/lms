# Library Management System - LMS

The Library Management System is a web application built with Laravel, designed to efficiently manage the operations of a library, including adding students, users, books, and categories, as well as handling book issuance, returns, and fine calculations.

## Features

- **User Management:**
  - Create and manage user accounts for library staff.
  - Differentiate between admin and regular staff roles.

- **Student Management:**
  - Add and manage student details, including name, class, and email.
  - Send registration notifications to students via email.

- **Book Management:**
  - Maintain a comprehensive database of books, including title, ISBN, and category.
  - Categorize books for easy navigation and management.

- **Issuance and Returns:**
  - Efficiently handle book issuance and returns for students.
  - Email notifications for book issuance and return with detailed information.

- **Fine Calculation:**
  - Automatically calculate fines based on admin-set fine amounts per day.
  - Notify users about fines in return notifications.

- **Settings Panel:**
  - Admin panel to manage system settings, including fine amounts and email configurations.
  - Easy customization of library policies.

- **Security and Middleware:**
  - Implement middleware for secure HTTP requests.
  - Apply best security practices to protect against vulnerabilities.

- **Responsive Design:**
  - Ensure a user-friendly experience on various devices with a responsive design.

## Screenshots

![Books List](https://drive.google.com/file/d/1QYQfTfnzNN6VryKrXEtHJ4h3qaAa6Nlv/view?usp=drive_linkg)

![Issued Books](https://drive.google.com/file/d/1gcgBIccKYTmbOSy-39SwKAceoJwglokg/view?usp=sharing)

![Issue New Book](https://drive.google.com/file/d/12dnlb-MMsCcHY_lhKrazUlNIvOn1vRr4/view?usp=sharing)

![Search Student with Name or ID](https://drive.google.com/file/d/1T5DZE2tSqZvXdrpGzwUT_WBxvCZg78-y/view?usp=sharing)

![Add New Students similar to User](https://drive.google.com/file/d/1LlLH_5t58AoaxrMaBNNp2NSmH1tDmwSk/view?usp=sharing)

## Getting Started

Follow these steps to set up and run the Library Management System on your local machine.

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/abbashaider99/lms.git

2. **Change into the project directory:**
    ```bash
    cd library-management-system

3. **Install dependencies:**
    ```bash
    composer install

4. **Copy the .env.example file and configure your database:**
    ```bash
    cp .env.example .env

5. **Generate application key:**
    ```bash
    php artisan key:generate

6. **Seed the database (optional, for sample data):**
    ```bash
    php artisan db:seed

7. **Serve the application:**
    ```bash
    php artisan serve

Access the application at [http://localhost:8000](http://localhost:8000).

*Login as an admin using the default credentials:*

- Username: admin@example.com
- Password: secret

*Explore the admin panel to configure settings, add students, books, and more.*

#### Email Notification

- The system sends email notifications for new student registrations, book issuances, and returns.
- Configure your mail settings in the `.env` file.

#### Contributing

Feel free to contribute to the project by opening issues or pull requests. Your feedback and contributions are welcome!
