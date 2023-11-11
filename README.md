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

![Screenshot 2023-11-11 at 15-49-49 Login](https://github.com/abbashaider99/lms/assets/97340314/1a6e0007-bcb3-42b9-8b36-4fc34e8c1b00)

![Screenshot 2023-11-11 at 15-50-00 LMS](https://github.com/abbashaider99/lms/assets/97340314/1b8e6b6a-29b7-42e5-b990-dc057eb7d8a3)

![Screenshot 2023-11-11 at 15-50-12 LMS](https://github.com/abbashaider99/lms/assets/97340314/30e02dca-80af-4004-a917-8f661c482cda)

![Screenshot 2023-11-11 at 15-50-22 LMS](https://github.com/abbashaider99/lms/assets/97340314/218b8a29-6001-46cc-b729-0c6a82afa10a)

![Screenshot 2023-11-11 at 15-50-37 LMS](https://github.com/abbashaider99/lms/assets/97340314/49c1ac3e-88bb-44b3-b9c0-71414b891a7d)

![Screenshot 2023-11-11 at 15-50-44 LMS](https://github.com/abbashaider99/lms/assets/97340314/31657411-5c85-4fc0-b584-7f007eae9e34)

![Screenshot 2023-11-11 at 15-50-50 LMS](https://github.com/abbashaider99/lms/assets/97340314/9a09d920-fbf8-4870-aca3-a1a107a60e72)

![Screenshot 2023-11-11 at 15-51-48 LMS](https://github.com/abbashaider99/lms/assets/97340314/62dc7ff1-7a36-4b3b-a772-a3cae6c601d6)

![Screenshot 2023-11-11 at 15-51-57 LMS](https://github.com/abbashaider99/lms/assets/97340314/4ff50a51-e5d7-4da0-addb-8187ee2c178f)

![Screenshot 2023-11-11 at 15-52-06 LMS](https://github.com/abbashaider99/lms/assets/97340314/814286eb-85d2-47f4-b389-875bc55de562)

![Screenshot 2023-11-11 at 15-52-21 LMS](https://github.com/abbashaider99/lms/assets/97340314/80efa1f1-34eb-49aa-a706-b06175b1d643)

![Screenshot 2023-11-11 at 15-52-14 LMS](https://github.com/abbashaider99/lms/assets/97340314/62ebfbb5-280e-4803-99ad-1dc44be4a91d)








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
