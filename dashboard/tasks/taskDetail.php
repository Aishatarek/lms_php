<?php
include('../function.php');
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
$item_id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $question_id = $item_id;
        $is_correct =  $_POST['is_correct'];
        $text = "'" . $_POST['text'] . "'";
        $Tasks->addAnswer($question_id, $is_correct, $text);
    }
    elseif (isset($_POST['deleteItem'])) {
        $Tasks->deleteAnswer($_POST['item_id']);
    }
}
include("../headerr.php");
?>
<section class="dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-12 sideNavv">
                <?php
                include('../sideNavv.php');
                ?>
            </div>
            <div class="col-md-10 col-sm-12">
                <?php
                foreach ($Tasks->getData() as $Task) :
                    if ($Task['id'] == $item_id) :
                ?>
                        <h3>
                            <?php echo $Task['text'] ?>
                        </h3>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">answer</th>
                                    <th scope="col">is correct</th>
                                    <th scope="col">-</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($Tasks->getData('taskanswers') as $Answer) :
                                    if ($Answer['question_id'] == $item_id) {
                                ?>
                                <tr>
                                        <td><?php echo $Answer['id']; ?></td>
                                        <td><?php echo $Answer['text']; ?></td>
                                        <td style="color: #318ce7;">
                                            <?php
                                            if ($Answer['is_correct'] == 1)
                                                echo '(The Correct Answer)';
                                            else
                                                echo '(Wrong Answer)';
                                            ?>
                                        </td>
                                        <td>
                                        <form method="post">
                                        <input type="hidden" value="<?php echo $Answer["id"] ?>" name="item_id">
                                        <button name="deleteItem" class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                        </td>
                                        </tr>
                                <?php
                                    }
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                        <div class="theform">
                            <form method="post" enctype="multipart/form-data">
                                <h3> Now Add The Choices</h3>
                                <input type="text" name="text" placeholder="answer">
                                <h5>is it the correct answer?</h5>
                                <select name="is_correct">
                                    <option value="1" selected> the Correct Answer </option>
                                    <option value="0"> Wrong Answer</option>
                                </select>
                                <button name="submit">add choice</button>
                            </form>
                        </div>
                <?php
                    endif;
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>
<?php
include("../../footer.php");
