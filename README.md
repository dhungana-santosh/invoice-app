# Invoice App

Invoice App is a simple multilingual application designed to demonstrate invoice listing with a feature to download the invoice. The development incorporates the following tools and techniques:

- Webpack Asset Management
- Laravel Blade
- Dependency Injection Architecture
- Fat Model Thin Controller Architecture

## App Setup

Follow these steps to set up the application:

1. Clone the main directory.

    ```bash
    git clone https://github.com/dhungana-santosh/invoice-app.git
    ```

2. Set up Docker and run the application.

    ```bash
    docker-compose up --build
    ```

3. After successfully initializing the container, open a new terminal.

4. Install all dependencies from the `composer.json` file.

    ```bash
    docker-compose exec php composer install
    ```

5. Install all dependencies from the `package.json` file.

    ```bash
    docker-compose exec php npm install
    ```

6. Compile all asset files through `webpack.mix.js`.

    ```bash
    docker-compose exec php npm run prod
    ```

7. Copy `.env.example` to `.env` and configure the environment variables that sync up with the Docker containers.

8. Run migrations and seed the required data for the app.

    ```bash
    docker-compose exec php php artisan migrate:fresh --seed
    ```

9. Access your app at [localhost:9090](http://localhost:9090). It will be redirected to [localhost:9090/login](http://localhost:9090/login) for login.

10. Use the following credentials for local/demo:

    - Email: 'john@example.com'
    - Password: 'WdE9ZGMed2Zr'

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
