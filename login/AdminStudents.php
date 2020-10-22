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
        .student {
            border: 1px solid black;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <h1>Students</h1>
    <button id='fetch'>Fetch</button>
    <div id="students">
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // in terms of editing, not allow multiple editing/ save and cancel changes
    let multiple = false;

    function formOpen(x) {
        if (x) {
            multiple = true;
        } else {
            multiple = false;
        }

    }

    function deleteForm(id) {
        let formid = "#" + id;
        // delete that form
        $(formid).remove();
        formOpen(false);

    }

    // get all the student
    $("#fetch").click(function() {
        GetStudent();
    });

    function GetStudent() {
        $.post("api/student/fetch.php", {
            edit: false,
            delete: false,
            data: "All"
        }, function(result) {
            DisplayStudent(result);
        });
    }

    let student;

    function DisplayStudent(obj) {
        let ele = $(".students");
        let displayElement = '';
        student = JSON.parse(obj);
        for (let i = 0; i < student.length; i++) {
            displayElement += `<div class='student' id='stu` + i + `'>
                <p>id: ` + student[i].id + `</p>
                <p>name: ` + student[i].name + `</p>
                <p>rollnumber: ` + student[i].rollnumber + `</p>
                <p>degree: ` + student[i].degree + `</p>
                <p>title: ` + student[i].title + `</p>
                <p>date: ` + student[i].date + `</p>
                <p>avatar: ` + student[i].avatar + `</p>

                <button onclick="editStart( 'stu` + i + `' , ` + i + ` )">Edit</button>
                <button onClick="deleteStudent(` + student[i].id + `, ` + i + ` , '` + student[i].avatar + `' )">Delete</button>
            </div>`;
        }
        $('#students').html(displayElement);
    }


    function editStart(id, i) {
        // check for multiple form
        if (multiple == false) {

            let formid = "editStudent" + i;
            id = "#" + id;
            let displayForm = `<form action="api/student/update.php"  method="post" enctype="multipart/form-data" id="` + formid + `">
            <input type="text" value="` + student[i].name + `"name="name" /><br>
            <input type="text" value="` + student[i].degree + `"name="degree" /><br>
            <input type="text" value="` + student[i].name + `"name="title" /><br>
            <input type="date" value="` + student[i].date + `"name="date" /><br>
            <input type="number" value="` + student[i].rollnumber + `"name="rollnumber" /><br>
            <input type="number" value="` + student[i].rollnumber + `"name="old_rollnumber" /><br>
            <input type="file" name="avatarlocation" accept="image/gif, image/jpeg, image/png" onchange="readURL(this);" id="testImgOrg" /><br>
            <input type="checkbox" name="img_status" id="image_change" hidden /><br>
            <img id="testImg" src="#" alt="your image" /><br>
            <input type="number" name="id" value="` + student[i].id + `" hidden /><br>
            <input type="submit" value="save" />
            <input type="button" value="cancel" onClick="deleteForm('` + formid + `');" />
            </form> `;


            let ele = $(id);
            ele.after(displayForm);
            displayImage();
            formOpen(true);
        } else {
            alert("You can edit one at a time");
        }
    }

    function deleteStudent(id, i, a) {
        $.post("api/student/delete.php", {
            delete: true,
            id: id,
            avatar: a
        }, function(result) {
            if (result === "Success") {
                let id = "#stu" + i;
                $(id).css("display", "none");
            }
        });
    }



    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#testImg')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
        let image_status = true;
        $("#image_change").prop('checked', true);

    }


    function displayImage() {
        // display old image
        $("#image_change").prop('checked', false);
        // var x = document.getElementById("testImgOrg");
        // console.log(x);
        // $('#testImg')
        //     .attr('src', x)
        //     .width(150)
        //     .height(200);
    }
</script>

</html>