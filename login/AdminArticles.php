<?php
session_start();
if (!empty($_SESSION["userId"])) {
    require_once './view/dashboard.php';
} else {
    require_once './view/login-form.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .article {
            border: 1px solid black;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <h1>Articles</h1>
    <button id="fetchall">Fetch</button>
    <div id="articles"></div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the articles

    $("#fetchall").click(function() {
        GetArticles();
    });

    function GetArticles() {
        $.post("api/article/fetch.php", {
            edit: false,
            delete: false,
            data: "All"
        }, function(result) {
            DisplayArticles(result);
        });
    }

    let articles;

    function DisplayArticles(obj) {
        articles = JSON.parse(obj);
        let displayElement = '';
        for (let i = 0; i < articles.length; i++) {
            displayElement += `<div class='article' id='art` + i + `'>
                <p>id: ` + articles[i].id + `</p>
                <p>title: ` + articles[i].title + `</p>
                <p>date: ` + articles[i].date + `</p>
                <p>authors: ` + articles[i].authors + `</p>
                <button onclick="editStart( 'art` + i + `' , ` + i + ` )">Edit</button>
                <button onClick="deleteArticle(` + articles[i].id + `, ` + i + ` )">Delete</button>
            </div>`;
        }
        $('#articles').html(displayElement);
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `    <form action="api/article/update.php"  method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="` + articles[i].title + `"  /><br>
        <input type="text" name="authors" value="` + articles[i].authors + `" /><br>
        <input type="date" name="date" value="` + articles[i].date + ` " /><br>
        <input type="number" name="id" value="` + articles[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form> `;
        let ele = $(id);
        ele.after(displayForm);
    }

    function deleteArticle(id, i) {
        $.post("api/article/delete.php", {
            delete: true,
            id: id
        }, function(result) {
            if (result === "Success") {
                // delete the element with id artid
                let id = "#art" + i;
                $(id).css("display", "none");
            }
        });
    }
</script>

</html>