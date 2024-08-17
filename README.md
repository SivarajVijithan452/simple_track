## About Application
 The system Simple task tracker includes functionalities such as creating, reading, updating, and deleting (CRUD) products. Additionally, system that integrates a frontend using Vite, Tailwind CSS, and DaisyUI. The system provides an API for managing products, with real-time updates using Laravel Echo and broadcasting events.

 The frontend of the Task Tracker application leverages modern web development tools to provide a smooth and responsive user experience. Vite is used as the build tool for the application, offering fast and efficient asset compilation and development. Unlike traditional build tools, Vite provides an optimized development environment with features like instant hot module replacement (HMR), ensuring that developers can see changes in real-time without refreshing the browser. This speed and efficiency in the build process enhance productivity and streamline the development workflow.

 Tailwind CSS serves as the foundation for styling the application's user interface. This utility-first CSS framework allows for rapid and flexible design with minimal custom CSS. By using predefined utility classes, Tailwind CSS promotes consistency and maintainability across the application. The styling approach ensures that the layout and components are highly customizable, responsive, and aligned with modern design trends. With Tailwind CSS, developers can create a visually appealing and cohesive interface while keeping the CSS codebase clean and manageable.

For component-based design, the application integrates DaisyUI, a Tailwind CSS plugin that provides a rich set of pre-designed UI components. DaisyUI simplifies the process of creating beautiful and functional components such as buttons, cards, and modals, which can be easily customized using Tailwind's utility classes. Additionally, the application utilizes Toastr for displaying real-time notifications and alerts. Toastr messages offer a user-friendly way to provide feedback on actions such as task creation, updates, or deletions, enhancing the overall user experience with timely and informative notifications.

## Features
Backend: Laravel 11 (PHP framework) Frontend: Vite (build tool), Tailwind CSS (CSS framework), DaisyUI (component library) Real-time Communication: Laravel Echo, Pusher Authentication: Laravel Breeze

## Setup Instructions
Ensure the following are installed on your machine:

PHP 8.0+
Composer
MySQL

## Installation Steps

Clone the Repository https://github.com/SivarajVijithan452/simple_track.git

Open your terminal and run the following command to clone the repository:

git clone 

## Install Backend Dependencies

composer install

## Install Frontend Dependencies

npm install

Open the .env file in a text editor and configure the following settings:

Database Connection: Update DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD to match your database setup. Broadcasting: Configure the BROADCAST_DRIVER, PUSHER_APP_ID, PUSHER_APP_KEY, PUSHER_APP_SECRET, and PUSHER_APP_CLUSTER if you're using Pusher for real-time events.

## Run the following command to start the backend server:

php artisan serve

This will start the Laravel server at http://localhost:8000.

## Start the Frontend Development Server

Open another terminal window and start the frontend server:

npm run dev

This will start the Vite development server