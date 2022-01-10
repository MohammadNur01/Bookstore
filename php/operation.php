<?php

require_once("db.php");

$con = createDb();


// create button click
if (isset($_POST['create'])) {
    createData();
}

if (isset($_POST['update'])) {
    updateData();
}

if (isset($_POST['delete'])) {
    deleteRecord();
}

if (isset($_POST['deleteall'])) {
    deleteAll();
}


function createData()
{
    $bookname = textboxValue("book_name");
    $bookplublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if ($bookname && $bookplublisher && $bookprice) {
        $sql = "INSERT INTO books(book_name, book_publisher, book_price) VALUES('$bookname', '$bookplublisher', '$bookprice')";

        if (mysqli_query($GLOBALS['con'], $sql)) {
            echo " <div class=\"alert alert-success\" role=\"alert\">
            Recorded successfully inserted...!
            </div>";
        } else {
            echo "Error";
        }
    } else {
        echo " <div class=\"alert alert-danger\" role=\"alert\">
        Please provide data in the textbox...!
        </div>";
    }
}

function textboxValue($value)
{
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($textbox)) {
        return false;
    } else {
        return $textbox;
    }
}


// Get data from mysql database
function getData()
{
    $sql = "SELECT * FROM books";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}

// Update Data
function updateData()
{
    $bookid = textboxValue("book_id");
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");


    if ($bookname && $bookpublisher && $bookprice) {
        $sql = "
        UPDATE books SET book_name='$bookname', book_publisher='$bookpublisher', book_price='$bookprice' WHERE id = '$bookid'
        ";

        if (mysqli_query($GLOBALS['con'], $sql)) {
            if (mysqli_query($GLOBALS['con'], $sql)) {
                echo " <div class=\"alert alert-success\" role=\"alert\">
                Updated successfully...!
                </div>";
            } else {
                echo " <div class=\"alert alert-danger\" role=\"alert\">
                Enable to Update data...!
                </div>";
            }
        } else {
            echo " <div class=\"alert alert-danger\" role=\"alert\">
            Select data using Edit icon...!
            </div>";
        }
    }
}

// delete Record

function deleteRecord()
{
    $bookid = (int)textboxValue("book_id");

    $sql = "DELETE FROM  books WHERE id=$bookid";

    if (mysqli_query($GLOBALS['con'], $sql)) {
        echo " <div class=\"alert alert-success\"       role=\"alert\">
                Deleted successfully...!
                </div>";
    } else {
        echo " <div class=\"alert alert-danger\" role=\"alert\">
        Enable to Delete record...!
        </div>";
    }
}

// Delete All
function deleteAll()
{

    $sql = "DROP TABLE books";

    if (mysqli_query($GLOBALS['con'], $sql)) {
        echo " <div class=\"alert alert-success\"       role=\"alert\">
        Deleted All Record successfully...!
        </div>";
        createDb();
    } else {
        echo " <div class=\"alert alert-danger\" role=\"alert\">
        Shomething went wrong record cannot deleted..!
        </div>";
    }
}

function setID()
{
    $getid = getData();
    $id = 0;
    if ($getid) {
        while ($row = mysqli_fetch_assoc($getid)) {
            $id = $row['id'];
        }
    }

    return ($id + 1);
}
