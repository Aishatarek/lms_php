<?php
include('dashboard/function.php');
$item_id = $_GET['id'];
include("./header.php");
foreach ($Lesson->getData() as $lessonn) :
    if ($lessonn['id'] == $item_id) :
        $course_ID = $lessonn['course_id'];
    endif;
endforeach;

// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     if (isset($_POST['taskSubmit'])) {
//         if (isset($_POST['taskanswer'])) {
//             if ($_POST['taskanswer'] == 1) {
//                echo '<script>alert("correct answer")</script>';
//             } else {
//                 echo '<script>alert("Wrong Answer")</script>';
//             }
//         } else {
//             echo '<script>alert("fill the Answer")</script>';
//         }
//     }
// }
foreach ($Lesson->getData() as $lessonn) :
    if ($lessonn['id'] == $item_id) :
?>
        <section class="pageBanner">
            <h3><?php echo $lessonn['name'] ?></h3>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-12 courseSubDetail">
                        <div class=" detaill">
                            <h3><?php echo $lessonn['name'] ?></h3>
                        </div>
                        <video width="300px" controls controlslist="nodownload" id="myVideo" oncontextmenu="return false;">
                            <source src="./uploads/lessons/<?php echo $lessonn["lesson"] ?>" type="video/mp4">
                        </video>
                        <h3><?php echo $lessonn['description'] ?></h3>
                        <div>
                            <?php
                            foreach ($Tasks->getData() as $Task) :
                                if ($Task['lesson_id'] == $item_id) : ?>
                                    <div class="questions">
                                        <h3><?php echo $Task['text'] ?></h3>
                                        <div>
                                            <form action="" method="POST" onsubmit="return result()" class="theForm">
                                                <?php
                                                foreach ($Tasks->getData('taskanswers') as $Answer) :
                                                    if ($Answer['question_id'] == $Task['id']) : ?>
                                                        <input type="radio" name="taskanswer" value="<?php echo $Answer['is_correct'] ?>" class="inputt">
                                                        <label><?php echo $Answer['text'] ?></label>
                                                        <br>
                                                <?php
                                                    endif;
                                                endforeach;
                                                ?>
                                                <button type="submit" name="taskSubmit" class="btn btn-outline-info">submit</button>
                                            </form>
                                        </div>
                                        <h3 class="result">

                                        </h3>
                                    </div>

                            <?php
                                endif;
                            endforeach;
                            ?>

                        </div>
                    </div>
            <?php

        endif;
    endforeach;
            ?>
            <div class="col-md-3 col-sm-12 sideCourses">
                <?php
                foreach ($Lesson->getData() as $lessonn) :
                    if ($lessonn['course_id'] == $course_ID) :
                ?>
                        <a href="lessonDetail.php?id=<?php echo $lessonn['id'] ?>">
                            <div class="d-flex">
                                <h3><?php echo $lessonn['name'] ?></h3>
                            </div>
                        </a>
                <?php
                    endif;
                endforeach;
                ?>
            </div>
                </div>
            </div>
        </section>
        <script>
            function result() {
                var ele = document.getElementsByClassName("theForm");
                var result = document.getElementsByClassName("result");
                console.log(ele);
                for (i = 0; i < ele.length; i++) {
                    var inputs = ele[i].getElementsByClassName("inputt");
                    for (j = 0; j < inputs.length; j++) {
                        if (inputs[j].checked) {
                            // result[i].innerHTML = inputs[j].value;
                            if (inputs[j].value == 1) {
                                result[i].innerHTML = "The answer of question " + (i + 1) + " is correct answer <br>";
                                result[i].style.color = "#318ce7"
                            } else {
                                result[i].innerHTML = "The answer of question " + (i + 1) + " is wrong answer <br>";
                                result[i].style.color = "red"

                            }
                        }
                    }

                }
                return false;
            }
        </script>

        <?php
        include("./footer.php");
        ?>