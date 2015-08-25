# _University Registrar_

#### _A registrar app built to work with "many to many" mySQL database, 8/25/2015_

#### By _**Charles Moss, Tyler Deem, Ike Mattice, Tim White**_

## Description

An input field accepts a student's info of "name" and "date of enrollment". Another input field accepts course info of "name" and a "course number" (ex. HIST100). The user can enroll students into course and then view the enrolled students by course.

## Setup
When installing from source you may notice that once you have cloned this repo, that this project makes use of a PHP Dependency Manager: [Composer](https://github.com/composer/composer). Once you have Composer installed you can acquire any project dependencies via your shell by entering:

```
$ composer install
```

[setting up mySQL database for this project](https://github.com/CharlesAMoss/epic_ToDo_mySQL/blob/master/SQL_todo_setup.md)

_You then only need to start up a local PHP server from within the "web" directory within the project's folder and point your browser to whatever local host server you have created._


_An export of our database can be found in the db folder_

## Technologies Used
_This project makes use of PHP, mySQL, the testing framework [PHPUnit](https://phpunit.de/), the micro-framework [Silex](http://silex.sensiolabs.org/), and uses [Twig](http://twig.sensiolabs.org/) templates._

### Legal

Copyright (c) 2015 Charles A Moss, Tyler Deem, Ike Mattice, Tim White

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
