<?php
require('connection.php');
require('users/users.php');
require('courses/courses.php');
require('lessons/lessons.php');
require('articles/articles.php');
require('payment/payment.php');
require('feedbacks/feedbacks.php');
require('cart/cart.php');
require('questions/questions.php');
require('tasks/tasks.php');

$db = new DBController();
$User = new User($db);
$course = new Course($db);
$Lesson = new Lesson($db);
$course_order = new CourseOrder($db);
$articles = new Article($db);
$feedbacks = new Feedback($db);
$Cart = new Cart($db);
$Questions = new Questions($db);
$Tasks = new Task($db);
