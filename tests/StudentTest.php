<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    // require_once "src/Course.php";
    require_once "src/Student.php";

    $server = 'mysql:host=localhost;dbname=to_do_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StudentTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            // Student::deleteAll();
            // Course::deleteAll();
        }

        function test_student_getName()
        {
            //Arrange
            $name = "Bobby";
            $id = 1;
            $enroll = "2015-10-10";
            $test_student = new Student($name, $id, $enroll);

            //Act
            $result = $test_student->getStudentName();

            //Assert
            $this->assertEquals($name, $result);
        }

    }


?>
