<?php

    class Student {

        private $student_name;
        private $enroll_date;

        function __construct($student_name, $id=null, $enroll_date="0000-00-00")
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
                $this->enroll_date = $new_enroll_date;
        }


        function getEnrollDate()
        {
            return $this->enroll_date;
        }









    }


?>
