<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\UserController;
use App\Controllers\JobController;
use App\Controllers\ApplyController;




$route = isset($_GET['route']) ? $_GET['route'] : 'Home';

// Instantiate the controller based on the route
switch ($route) {
    case 'Home':
        $controller = new UserController();
        $controller->index();
        break;
    case 'fetchMoreUsers':
        $controller = new UserController();
        $controller->fetchMoreUsers();
        break;
    case 'login':
        $logincontroller = new UserController();
        $logincontroller->login($email, $password);
        break;
    case 'addJob':
            $logincontroller = new JobController();
            $logincontroller->addJob($title, $description, $entreprise, $location, $isActive, $approve, $photo);
            break;
    case 'getJob':
            $logincontroller = new JobController();
            $logincontroller->getJobs($isActive);
            break;
    case 'deleteJob':
            $logincontroller = new JobController();
            $logincontroller->deleteJob($idJob);
            break;
    case 'updateJob':
            $logincontroller = new JobController();
            $logincontroller->updateJob($title, $description, $entreprise, $location, $isActive, $approve, $idJobs);
            break;
    // Add more cases for other routes as needed
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

// Execute the controller action

?>