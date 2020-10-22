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
        .experience {
            border: 1px solid black;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <h1>Experiences</h1>
    <button id="fetch">Fetch</button>
    <div id="experiences">
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the experience

    $("#fetch").click(function() {
        GetExperience();
    });

    function GetExperience() {
        $.post("api/experience/fetch.php", {
            edit: false,
            delete: false,
            data: "All"
        }, function(result) {
            DisplayExperience(result);
        });
    }

    let experience;

    function DisplayExperience(obj) {
        experience = JSON.parse(obj);
        let displayElement = '';
        for (let i = 0; i < experience.length; i++) {
            displayElement += `<div class='experience' id='exp` + i + `'>
                <p>id: ` + experience[i].id + `</p>
                <p>position: ` + experience[i].position + `</p>
                <p>description: ` + experience[i].description + `</p>
                <p>start date: ` + experience[i].date_start + `</p>
                <p>end date: ` + experience[i].date_end + `</p>
                <button onclick="editStart( 'exp` + i + `' , ` + i + ` )">Edit</button>
                <button onClick="deleteExperience(` + experience[i].id + `, ` + i + ` )">Delete</button>
            </div>`;
        }
        $('#experiences').html(displayElement);
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `<form action="api/experience/update.php"  method="post" enctype="multipart/form-data">
        <input type="text" value="` + experience[i].position + `" name="position" /><br>
        <input type="text" value="` + experience[i].description + `" name="description" /><br>
        <input type="date" name="sdate" value="` + experience[i].date_start + `" /><br>
        <input type="date" name="edate" value="` + experience[i].date_end + `" /><br>
        <input type="number" name="id" value="` + experience[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form>`;
        let ele = $(id);
        ele.after(displayForm);
    }

    function deleteExperience(id, i) {
        $.post("api/experience/delete.php", {
            delete: true,
            id: id
        }, function(result) {
            if (result === "Success") {
                // delete the element with id artid
                let id = "#exp" + i;
                $(id).css("display", "none");
            }
        });
    }
</script>

</html>