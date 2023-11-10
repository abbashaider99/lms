# Library Management System

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

## Getting Started

Follow these steps to set up and run the Library Management System on your local machine.

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/abbashaider99/lms.git

Change into the project directory:

```cd library-management-system
```

Install dependencies:

```composer install
```

Copy the .env.example file and configure your database:

```cp .env.example .env
```

Generate application key:

```php artisan key:generate
```

Seed the database (optional, for sample data):

```php artisan db:seed
```

Serve the application:

```php artisan serve
```



Access the application at [http://localhost:8000](http://localhost:8000).

2. Login as an admin using the default credentials:

- Username: admin@example.com
- Password: secret

3. Explore the admin panel to configure settings, add students, books, and more.

#### Email Notification

- The system sends email notifications for new student registrations, book issuances, and returns.
- Configure your mail settings in the `.env` file.

#### Contributing

Feel free to contribute to the project by opening issues or pull requests. Your feedback and contributions are welcome!
