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

![Screenshot 2023-11-12 at 00-41-44 Login](https://github.com/abbashaider99/lms/assets/97340314/00256522-2876-4e3b-ba69-286ac986b74b)

![Screenshot 2023-11-12 at 00-43-39 LMS](https://github.com/abbashaider99/lms/assets/97340314/f15c082a-ebc9-482b-9f4b-aecbea79d006)

![Screenshot 2023-11-12 at 00-44-06 LMS](https://github.com/abbashaider99/lms/assets/97340314/30b22f06-6bcd-43c9-8a8d-847f44b8d636)

![Screenshot 2023-11-12 at 00-44-16 LMS](https://github.com/abbashaider99/lms/assets/97340314/91c5d946-142c-4583-a358-a188aba837a2)

![Screenshot 2023-11-12 at 00-44-24 LMS](https://github.com/abbashaider99/lms/assets/97340314/cb04eb11-0cba-4153-b293-2ee315f9dfa6)

![Screenshot 2023-11-12 at 00-44-31 LMS](https://github.com/abbashaider99/lms/assets/97340314/0636bbd6-e1cc-4fb9-8fa0-50baf705410e)

![Screenshot 2023-11-12 at 00-44-53 LMS](https://github.com/abbashaider99/lms/assets/97340314/c1aee35a-a2a7-4714-8afe-ae83ddc9fc7c)

![Screenshot 2023-11-12 at 00-45-02 LMS](https://github.com/abbashaider99/lms/assets/97340314/379b8eda-a9c6-4ae1-9b18-47fb55349ade)

![Screenshot 2023-11-12 at 00-45-34 LMS](https://github.com/abbashaider99/lms/assets/97340314/5d07e02a-07b8-421d-93fb-cf80df45eae5)

![Screenshot 2023-11-12 at 00-46-31 Book Issued Successfully - English - work abbashaider@gmail com - Gmail](https://github.com/abbashaider99/lms/assets/97340314/f53ad626-0f10-4c24-bcfc-3815f4754f3c)



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
