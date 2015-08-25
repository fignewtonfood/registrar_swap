<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    // require_once "src/Course.php";
    require_once "src/Student.php";

    $server = 'mysql:host=localhost;dbname=registrar_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StudentTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Student::deleteAll();
            // Course::deleteAll();
        }

        function test_student_getName()
        {
            //Arrange
            $name = "Bobby";

            $enroll = "2015-10-10";
            $test_student = new Student($name, $enroll);
            $test_student->save();

            //Act
            $result = $test_student->getStudentName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_student_setStudentName()
        {
            //Arrange
            $name = "Bobby";

            $enroll = "2015-10-10";
            $test_student = new Student($name, $enroll);
            $test_student->save();

            //Act
            $test_student->setStudentName("Ricky");
            $result = $test_student->getStudentName();


            //Assert
            $this->assertEquals("Ricky", $result);
        }

        function test_student_getId()
        {
            //Arrange
            $name = "Bobby";
            $enroll = "2015-10-10";
            $test_student = new Student($name, $enroll);
            $test_student->save();

            //Act
            $result = $test_student->getId();


            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_student_getEnrollDate()
        {
            //Arrange
            $name = "Bobby";

            $enroll = "2015-10-10";
            $test_student = new Student($name, $enroll);
            $test_student->save();

            //Act
            $result = $test_student->getEnrollDate();

            //Assert
            $this->assertEquals($enroll, $result);
        }

        function test_student_setEnrollDate()
        {
            //Arrange
            $name = "Bobby";

            $enroll = "2015-10-10";
            $test_student = new Student($name, $enroll);
            $test_student->save();

            //Act
            $test_student->setEnrollDate("2016-10-10");
            $result = $test_student->getEnrollDate();


            //Assert
            $this->assertEquals("2016-10-10", $result);
        }

        function test_student_save()
        {
            //Arrange
            $name = "Bobby";

            $enroll = "2015-10-10";
            $test_student = new Student($name, $enroll);

            //Act
            $test_student->save();

            //Assert
            $result = Student::getAll();
            $this->assertEquals($test_student, $result[0]);
        }

        function test_getAll()
        {
            $name = "Bobby";
            $enroll = "2015-10-10";
            $test_student = new Student($name, $enroll);
            $test_student->save();

            $name2 = "Sally7";
            $enroll2 = "2000-07-01";
            $test_student2 = new Student($name2, $enroll2);
            $test_student2->save();

            $result = Student::getAll();

            $this->assertEquals([$test_student, $test_student2], $result);
        }

        function test_deleteAll()
        {
            $name = "Bobby";
            $enroll = "2015-10-10";
            $test_student = new Student($name, $enroll);
            $test_student->save();

            $name2 = "Sally7";
            $enroll2 = "2000-07-01";
            $test_student2 = new Student($name2, $enroll2);
            $test_student2->save();

            Student::deleteAll();
            $result=Student::getAll();

            $this->assertEquals([], $result);

        }

        function test_find()
        {
            $name = "Bobby";
            $enroll = "2015-10-10";
            $test_student = new Student($name, $enroll);
            $test_student->save();

            $name2 = "Sally7";
            $enroll2 = "2000-07-01";
            $test_student2 = new Student($name2, $enroll2);
            $test_student2->save();

            $result = Student::find($test_student->getId());

            $this->assertEquals($test_student, $result);
        }
    }
?>
