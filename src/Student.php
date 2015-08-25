<?php

    class Student {

        private $student_name;
        private $enroll_date;
        private $id;

        function __construct($student_name, $id=null, $enroll_date)
        {
            $this->student_name = $student_name;
            $this->id = $id;
            $this->enroll_date = $enroll_date;
        }

        function setStudentName($new_student_name)
        {
            $this->student_name = (string) $new_student_name;
        }

        function getStudentName()
        {
            return $this->student_name;
        }

        function getId()
        {
            return $this->id;
        }

        function setEnrollDate($new_enroll_date)
        {
            $this->enroll_date = (string) $new_enroll_date;
        }

        function getEnrollDate()
        {
            return $this->enroll_date;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO students (student_name, enroll_date) VALUES ('{$this->getStudentName()}', '{$this->getEnrollDate()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_students = $GLOBALS['DB']->query("SELECT * FROM students;");
            $students = array();
            foreach($returned_students as $student) {
                $student_name = $student['student_name'];
                $id = $student['id'];
                $enroll_date = $student['enroll_date'];
                $new_student = new Student($student_name, $id, $enroll_date);
                array_push($students, $new_student);
            }
            return $students;
        }
    }
?>
