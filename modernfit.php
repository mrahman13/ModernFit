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
    case '/adminHomepage':
        $url = '/adminHomepage.admin.php';
        require __DIR__ . $url;
        break;

    case '/contactForm':
        $url = '/contactForm.member.php';
        require __DIR__ . $url;
        break;

    case '/entryLog':
        $url = '/entryLog.member.php';
        require __DIR__ . $url;
        break;

    case '/home':
        $url = '/index.php';
        require __DIR__ . $url;
        break;

    case '/managerHomepage':
        $url = '/managerHomepage.manager.php';
        require __DIR__ . $url;
        break;

    case '/mealCreator':
        $url = '/mealCreator.personalTrainer.php';
        require __DIR__ . $url;
        break;

    case '/memberHomepage':
        $url = '/memberHomepage.member.php';
        require __DIR__ . $url;
        break;

    case '/nutrition':
        $url = '/nutritionalInfo.member.personalTrainer.php';
        require __DIR__ . $url;
        break;

    case '/personalTrainerHomepage':
        $url = '/personalTrainerHomepage.personalTrainer.php';
        require __DIR__ . $url;
        break;

    case '/personalTrainerManager':
        $url = '/personalTrainerManager.manager.php';
        require __DIR__ . $url;
        break;

    case '/personalTrainerMembersData':
        $url = '/personalTrainerMemberData.personalTrainer.php';
        require __DIR__ . $url;
        break;

    case '/personalTrainerMembers':
        $url = '/personalTrainerMembers.personalTrainer.php';
        require __DIR__ . $url;
        break;

    case '/programManager':
        $url = '/programManager.manager.php';
        require __DIR__ . $url;
        break;

    case '/recipeViewer':
        $url = '/recipeViewer.member.php';
        require __DIR__ . $url;
        break;

    case '/registration':
        $url = '/registration.php';
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
        $url = '/tailoredProgram.member.php';
        require __DIR__ . $url;
        break;

    case '/workoutCreator':
        $url = '/workoutCreator.personalTrainer.php';
        require __DIR__ . $url;
        break;

    case '/workoutViewer':
        $url = '/workoutViewer.member.php';
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
