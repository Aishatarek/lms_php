<?php
include("../function.php");
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem'])) {
        $articles->deleteArticle($_POST['item_id']);
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
                <a href="addArticle.php" class="addBTN"> <button>Add Article</button></a>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title_en</th>
                            <th scope="col">Title_ar</th>
                            <th scope="col">Description_en</th>
                            <th scope="col">Description_ar</th>
                            <th scope="col">Image</th>
                            <th scope="col">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($articles->getData() as $article) :
                        ?>

                            <tr>
                                <td><?php echo $article['id']; ?></td>
                                <td><?php echo $article['title_en']; ?></td>
                                <td><?php echo $article['title_ar']; ?></td>
                                <td><?php echo $article['description_en']; ?></td>
                                <td><?php echo $article['description_ar']; ?></td>
                                <td><img src="../../uploads/articles/<?php echo $article['image']; ?>" alt="" height="50px" width="50px"></td>
                                <td class="d-flex">
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $article["id"] ?>" name="item_id">
                                        <button name="deleteItem" class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="updateArticle.php?id=<?php echo $article['id']; ?>"><button class="btn btn-outline-info"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                </td>
                            </tr>

                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php
include("../../footer.php");
?>