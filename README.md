## Description
This project was developed following a YouTube course by Eng. Hassan Zohdy. You can find the course [here](https://www.youtube.com/playlist?list=PLGO8ntvxgiZPZBHUGED6ItUujXylNGpMH).

### Installation

1. Clone the repository to your local machine:
    ```bash
    git clone https://github.com/abdallahx0/php-mvc-framework.git
    ```

2. Navigate to the project directory:
    ```bash
    cd project-folder
    ```

3. Configure your web server.

4. Set up your database configuration in `config.php`.

5. Run the SQL script to set up your database (if provided).

### Directory Structure

- `App/`
  - `Controllers/`: Contains the controller classes.
  - `Models/`: Contains the model classes.
  - `Views/`: Contains the view files.
  - `routes.php`: Defines the application routes.

- `public/`: The public directory for css & js files.

- `vendor/`
    `System/`
        - `Http/`
            - `Request.php`: Handles HTTP requests.
            - `Response.php`: Handles HTTP responses.
            - `UploadedFile.php`: Handles file uploads.
        - `View/`
            - `View.php`: Handles view rendering.
            - `ViewFactory.php`: Creates view instances.
            - `ViewInterface.php`: Defines the view interface.
        - `Application.php`: Main application class.
        - `Controller.php`: Base controller class.
        - `Cookie.php`: Handles cookie operations.
        - `Database.php`: Handles database connections and queries.
        - `File.php`: Handles file operations.
        - `Html.php`: Helper for HTML generation.
        - `Loader.php`: Autoloads classes.
        - `Model.php`: Base model class.
        - `Route.php`: Handles routing.
        - `Session.php`: Handles session operations.
        - `Url.php`: Handles URL generation and manipulation.

    - `helpers.php`: Contains helper functions.

- `config.php`: Configuration file.
- `index.php`: Entry point of the application.

### Usage

1. Define your routes in `App/routes.php`:
    ```php
    $app = Application::getInstance();
    $app->route->add('/' , 'Home');
    ```

2. Create controllers in `App/Controllers`:
    ```php
    namespace App\Controllers;

    use System\Controller;

    class HomeController extends Controller
    {
        public function index()
        {
            return $this->view->render('home');
        }
    }
    ```

3. Create models in `App/Models`:
    ```php
    namespace App\Models;

    use System\Model;

    class User extends Model
    {
        protected $table = 'users';
    }
    ```

4. Create views in `App/Views`:
    ```html
    <!-- App/Views/home.php -->
    <h1>Welcome to My Custom MVC Framework</h1>
    ```