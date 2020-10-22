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
        .conference {
            border: 1px solid black;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <h1>Conferences</h1>
    <button id="fetch">Fetch</button>
    <div id="conferences">
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the articles

    $("#fetch").click(function() {
        GetConference();
    });

    function GetConference() {
        $.post("api/conference/fetch.php", {
            edit: false,
            delete: false,
            data: "All"
        }, function(result) {
            DisplayConference(result);
        });
    }

    let conference;

    function DisplayConference(obj) {
        conference = JSON.parse(obj);
        let displayElement = '';
        for (let i = 0; i < conference.length; i++) {
            displayElement += `<div class='conference' id='art` + i + `'>
                <p>id: ` + conference[i].id + `</p>
                <p>title: ` + conference[i].title + `</p>
                <p>people: ` + conference[i].people + `</p>
                <p>date: ` + conference[i].date + `</p>
                <button onclick="editStart( 'art` + i + `' , ` + i + ` )">Edit</button>
                <button onClick="deleteConference(` + conference[i].id + `, ` + i + ` )">Delete</button>
            </div>`;
        }
        $('#conferences').html(displayElement);
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `<form action="api/conference/update.php"  method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="` + conference[i].title + `"  /><br>
        <input type="text" name="people" value="` + conference[i].people + `" /><br>
        <input type="date" name="date" value="` + conference[i].date + ` " /><br>
        <input type="number" name="id" value="` + conference[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form> `;
        let ele = $(id);
        ele.after(displayForm);
    }


    function deleteConference(id, i) {
        $.post("api/conference/delete.php", {
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