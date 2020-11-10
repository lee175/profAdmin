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
<script src="./jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the student

    $("#fetch").click(function() {
        GetStudent();
    });

    function GetStudent() {
        $.post("api/students/fetch.php", {
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
                <p>degree: ` + student[i].degree + `</p>
                <p>title: ` + student[i].title + `</p>
                <p>description: ` + student[i].description + `</p>
                <p>designation: ` + student[i].designation + `</p>

                <button onclick="editStart( 'stu` + i + `' , ` + i + ` )">Edit</button>
                <button onClick="deleteStudent(` + student[i].id + `, ` + i + `)">Delete</button>
            </div>`;
        }
        $('#students').html(displayElement);
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `<form action="api/students/update.php"  method="post" enctype="multipart/form-data">
        <input type="text" value="` + student[i].name + `"name="name" /><br>
        <input type="text" value="` + student[i].degree + `"name="degree" /><br>
        <input type="text" value="` + student[i].designation + `"name="designation" /><br>
        <input type="text" value="` + student[i].title + `"name="title" /><br>
        <input type="text" value="` + student[i].description + `"name="description" /><br>
        <input type="file" name="avatarlocation" /><br>
        <input type="number" name="id" value="` + student[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form> `;
        let ele = $(id);
        ele.after(displayForm);
    }

    function deleteStudent(id, i) {
        $.post("api/students/delete.php", {
            delete: true,
            id: id
        }, function(result) {
            if (result === "Success") {
                let id = "#stu" + i;
                $(id).css("display", "none");
            }
        });
    }
</script>

</html>