<?php

$request = $_SERVER['PATH_INFO'];

switch ($request) {
    case '':
        /*case '/':
        require __DIR__ . $viewDir . 'home.php';
        break;*/

        /*case '/views/users':
        require __DIR__ . $viewDir . 'users.php';
        break;*/
    case '/404':
        $url = '/404.php';
        require __DIR__ . $url;
        break;

    case '/contactForm':
        $url = '/contactForm.php';
        require __DIR__ . $url;
        break;

    case '/entryLog':
        $url = '/entryLog.php';
        require __DIR__ . $url;
        break;

    case '/home':
        $url = '/index.php';
        require __DIR__ . $url;
        break;

    case '/mealCreator':
        $url = '/mealCreator.php';
        require __DIR__ . $url;
        break;

    case '/homepage':
        $url = '/homepage.php';
        require __DIR__ . $url;
        break;

    case '/nutrition':
        $url = '/nutritionalInfo.php';
        require __DIR__ . $url;
        break;

    case '/personalTrainerManager':
        $url = '/personalTrainerManager.php';
        require __DIR__ . $url;
        break;

    case '/personalTrainerMembersData':
        $url = '/personalTrainerMemberData.php';
        require __DIR__ . $url;
        break;

    case '/personalTrainerMembers':
        $url = '/personalTrainerMembers.php';
        require __DIR__ . $url;
        break;

    case '/programManager':
        $url = '/programManager.php';
        require __DIR__ . $url;
        break;

    case '/recipeViewer':
        $url = '/recipeViewer.php';
        require __DIR__ . $url;
        break;

    case '/registration':
        $url = '/registration.php';
        require __DIR__ . $url;
        break;

    case '/sendEmail':
        $url = '/sendEmailAdmin.php';
        require __DIR__ . $url;
        break;

    case '/servicesAndFacilites':
        $url = '/servicesAndFacilites.php';
        require __DIR__ . $url;
        break;

    case '/signIn':
        $url = '/signIn.php';
        require __DIR__ . $url;
        break;

    case '/tailoredProgram':
        $url = '/tailoredProgram.php';
        require __DIR__ . $url;
        break;

    case '/workoutCreator':
        $url = '/workoutCreator.php';
        require __DIR__ . $url;
        break;

    case '/workoutViewer':
        $url = '/workoutViewer.php';
        require __DIR__ . $url;
        break;

    case '/signOut':
        $url = '/includes/signOut.php';
        require __DIR__ . $url;
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/404.php';
}
