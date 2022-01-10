<?php

require_once("../bookstore_crud/php/db.php");
require_once("../bookstore_crud/php/operation.php");

createDb();

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- font boostrap -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Book Store App</title>
</head>

<body>


    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Book Store</h1>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-warning"><i class="fas fa-id-badge"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="ID" autocomplete="off" name="book_id" value="<?= setID(); ?>" readonly>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-warning"><i class="fas fa-book"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Book Name" autocomplete="off" name="book_name" value="">
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-warning"><i class="fas fa-people-carry"></i></div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Publisher" autocomplete="off" name="book_publisher" value="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-warning"><i class="fas fa-dollar-sign"></i></div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Price" autocomplete="off" name="book_price" value="">
                        </div>

                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success" name="create" id="btn-create"><i class="fas fa-plus"></i></button>
                    <button class="btn btn-primary" name="read" id="btn-read"><i class="fas fa-sync"></i></button>
                    <button class="btn btn-light border" name="update" id="btn-update"><i class="fas fa-pen-alt"></i></button>
                    <button class="btn btn-danger" name="delete" id="btn-delete"><i class="fas fa-trash-alt"> </i></button>
                    <button class="btn btn-danger" name="deleteall" id="btn-delete"><i class="fas fa-trash-alt"></i>Delete All</button>
                </div>
            </form>
        </div>

        <!-- Boostrap Table -->
        <div class="d-flex table-data ">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>Book Price</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php

                    if (isset($_POST['read'])) {
                        $result = getData();

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>

                                <tr>
                                    <td data-id="<?php echo $row['id']; ?>"><?= $row['id']; ?></td>
                                    <td data-id="<?php echo $row['id']; ?>"><?= $row['book_name']; ?></td>
                                    <td data-id="<?php echo $row['id']; ?>"><?= $row['book_publisher']; ?></td>
                                    <td data-id="<?php echo $row['id']; ?>"><?= '$' . $row['book_price']; ?></td>
                                    <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i>
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="../bookstore_crud/php/main.js"></script>

</body>

</html>