<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Course.php";
    require_once __DIR__."/../src/Student.php";

    $app = new Silex\Application();
    $app['debug'] = true;

    $server = 'mysql:host=localhost;dbname=registrar';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('students' => Student::getAll(), 'courses' => Course::getAll()));
    });

    $app->get("/courses", function() use ($app) {
        return $app['twig']->render('courses.html.twig', array('courses' => Course::getAll(), 'students' => Student::getAll()));
    });

    $app->get("/students", function() use ($app) {
        return $app['twig']->render('students.html.twig', array('students' => Student::getAll()));
    });

    $app->post("/students", function() use ($app) {
        $student = new Student($_POST['student_name_twig'], $_POST['enroll_date_twig']);
        $student->save();
        return $app['twig']->render('students.html.twig', array('students' => Student::getAll()));
    });


    $app->get("/students/{id}", function($id) use ($app) {
        $student = Student::find($id);
        return $app['twig']->render('student.html.twig', array('student' => $student, 'courses' => $student->getCourses(), 'all_courses' => Course::getAll()));
    });


    $app->post("/courses", function () use ($app) {
        $course = new Course($_POST['course_name_twig'], $_POST['course_number_twig']);
        $course->save();
        return $app['twig']->render('courses.html.twig', array('courses' => Course::getAll(), 'students' => Student::getAll()));
    });



    // $app->get("/courses/{id}", function ($id) use ($app) {
    //     $course = Course::find($id);
    //     return $app['twig']->render('course.html.twig', array('course' => $course, 'students' => $course->getCategories(), 'all_students' => Student::getAll()));
    // });
    //
    // $app->post("/delete_courses", function() use ($app) {
    //     Course::deleteAll();
    //     return $app['twig']->render('index.html.twig');
    // });
    //
    // $app->post("/delete_students", function() use ($app) {
    //     Student::deleteAll();
    //     return $app['twig']->render('index.html.twig');
    // });
    //
    // $app->post("/add_courses", function () use ($app){
    //    $student = Student::find($_POST['student_id']);
    //    $course = Course::find($_POST['course_id']);
    //    $student->addCourse($course);
    //    return $app['twig']->render('student.html.twig', array('student'=>$student, 'students' => Student::getAll(), 'courses' => $student->getCourses(), 'all_courses' => Course::getAll()));
    // });
    //
    // $app->post("/add_students", function () use ($app){
    //    $student = Student::find($_POST['student_id']);
    //    $course = Course::find($_POST['course_id']);
    //    $course->addStudent($student);
    //    return $app['twig']->render('course.html.twig', array('course' => $course, 'courses' => Course::getAll(), 'students' => $course->getCategories(), 'all_students' => Student::getAll()));
    // });

    return $app;
?>
