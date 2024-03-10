This is a web application built with Laravel (v8.83.27) that allows users to filter a dataset based on a person's birth year, birth month, or both. The dataset is paginated for better user experience, and the results are cached using Redis for faster retrieval.

## Features
- Filter dataset by birth year, birth month, or both.
- Paginated display of filtered dataset.
- Caching of filtered dataset using Redis.
- Pagination retrieves data from the Redis cache if available.


## Prerequisites

Before you begin, ensure you have met the following requirements:

- Composer installed locally.
- PHP >= 7.4 installed on your machine.
- Redis server installed and running locally.

## Installation
To install and run this project locally, follow these steps:
1. Clone the repository to your local machine:
       git clone https://github.com/Samin47/Dataset-Filtering-Application.git
2. Install dependencies using Composer:
       composer install
3. Copy the .env.example file and rename it to .env. Then, update the database and Redis configurations in the .env file according to your setup.
4. Generate the application key:
       php artisan key:generate
5. Run database migrations to create necessary tables:
       php artisan migrate
6. Start the Laravel development server.
       php artisan serve

## Usage
Once the application is running, you can use the following steps to filter the dataset:

- Enter the birth year and/or birth month in the respective input fields.
- Click on the "Filter" button to apply the filter.
- The filtered dataset will be displayed below the filter form with pagination.
- You can navigate through the pages of the dataset using the pagination links.

