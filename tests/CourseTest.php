<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Course.php";
    require_once "src/Student.php";

    $server = 'mysql:host=localhost;dbname=registrar_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class CourseTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Course::deleteAll();
            Student::deleteAll();
        }

        function test_course_getName()
        {
            //Arrange
            $course_name = "Biology";

            $course_number = "BIO 101";
            $test_course = new Course($course_name, $course_number);
            $test_course->save();

            //Act
            $result = $test_course->getCourseName();

            //Assert
            $this->assertEquals($course_name, $result);
        }

        function test_course_setCourseName()
        {
            //Arrange
            $course_name = "Biology";

            $course_number = "BIO 101";
            $test_course = new Course($course_name, $course_number);
            $test_course->save();

            //Act
            $test_course->setCourseName("Ricky");
            $result = $test_course->getCourseName();


            //Assert
            $this->assertEquals("Ricky", $result);
        }

        function test_course_getId()
        {
            //Arrange
            $course_name = "Biology";
            $course_number = "BIO 101";
            $test_course = new Course($course_name, $course_number);
            $test_course->save();

            //Act
            $result = $test_course->getId();


            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_course_getCourseNumber()
        {
            //Arrange
            $course_name = "Biology";

            $course_number = "BIO 101";
            $test_course = new Course($course_name, $course_number);
            $test_course->save();

            //Act
            $result = $test_course->getCourseNumber();

            //Assert
            $this->assertEquals($course_number, $result);
        }

        function test_course_setCourseNumber()
        {
            //Arrange
            $course_name = "Biology";

            $course_number = "BIO 101";
            $test_course = new Course($course_name, $course_number);
            $test_course->save();

            //Act
            $test_course->setCourseNumber("BIO 102");
            $result = $test_course->getCourseNumber();


            //Assert
            $this->assertEquals("BIO 102", $result);
        }

        function test_course_save()
        {
            //Arrange
            $course_name = "Biology";

            $course_number = "BIO 101";
            $test_course = new Course($course_name, $course_number);

            //Act
            $test_course->save();

            //Assert
            $result = Course::getAll();
            $this->assertEquals($test_course, $result[0]);
        }

        function test_getAll()
        {
            $course_name = "Biology";
            $course_number = "BIO 101";
            $test_course = new Course($course_name, $course_number);
            $test_course->save();

            $course_name2 = "HISTORY";
            $course_number2 = "HIST 101";
            $test_course2 = new Course($course_name2, $course_number2);
            $test_course2->save();

            $result = Course::getAll();

            $this->assertEquals([$test_course, $test_course2], $result);
        }

        function test_deleteAll()
        {
            $course_name = "Biology";
            $course_number = "BIO 101";
            $test_course = new Course($course_name, $course_number);
            $test_course->save();

            $course_name2 = "HISTORY";
            $course_number2 = "HIST 101";
            $test_course2 = new Course($course_name2, $course_number2);
            $test_course2->save();

            Course::deleteAll();
            $result=Course::getAll();

            $this->assertEquals([], $result);

        }

        function test_find()
        {
            $course_name = "Biology";
            $course_number = "BIO 101";
            $test_course = new Course($course_name, $course_number);
            $test_course->save();

            $course_name2 = "HISTORY";
            $course_number2 = "HIST 101";
            $test_course2 = new Course($course_name2, $course_number2);
            $test_course2->save();

            $result = Course::find($test_course->getId());

            $this->assertEquals($test_course, $result);
        }

        function test_updateCourseName()
        {
            $course_name = "Biology";
            $course_number = "BIO 101";
            $test_course = new Course($course_name, $course_number);
            $test_course->save();
            $new_course_name = "Intro to Biology";

            $test_course->updateCourseName($new_course_name);
            $result = $test_course->getCourseName();

            $this->assertEquals($new_course_name, $result);
        }

        function test_updateCourseNumber()
        {
            $course_name = "Biology";
            $course_number = "BIO 101";
            $test_course = new Course($course_name, $course_number);
            $test_course->save();
            $new_course_number = "BIO 107";

            $test_course->updateCourseNumber($new_course_number);
            $result = $test_course->getCourseNumber();

            $this->assertEquals($new_course_number, $result);
        }

        function test_deleteOne()
        {
            $course_name = "Biology";
            $course_number = "BIO 101";
            $test_course = new Course($course_name, $course_number);
            $test_course->save();

            $course_name2 = "HISTORY";
            $course_number2 = "HIST 101";
            $test_course2 = new Course($course_name2, $course_number2);
            $test_course2->save();

            $test_course->deleteOne();

            $this->assertEquals([$test_course2], Course::getAll());
        }
    }
    ?>
