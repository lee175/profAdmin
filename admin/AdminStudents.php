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
    <h1>Fetch all students</h1>
    <p>get data</p>
    <div class="students">
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the student

    $("p").click(function() {
        GetStudent();
    });

    function GetStudent() {
        $.post("API/student/fetch.php", {
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
        student = JSON.parse(obj);
        for (let i = 0; i < student.length; i++) {
            let displayElement = `<div class='student' id='stu` + i + `'>
                <p>id: ` + student[i].id + `</p>
                <p>name: ` + student[i].name + `</p>
                <p>rollnumber: ` + student[i].rollnumber + `</p>
                <p>degree: ` + student[i].degree + `</p>
                <p>title: ` + student[i].title + `</p>
                <p>date: ` + student[i].date + `</p>
                <p>avatar: ` + student[i].avatar + `</p>

                <p onclick="editStart( 'stu` + i + `' , ` + i + ` )">edit</p>
                <p onClick="deleteStudent(` + student[i].id + `, ` + i + ` , '` + student[i].avatar + `' )">delete</p>
            </div>`;
            ele.after(displayElement);
        }
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `    <form action="API/article/update.php"  method="post" enctype="multipart/form-data">
        
        <input type="text" placeholder="name" name="name" /><br>
        <input type="text" placeholder="degree" name="degree" /><br>
        <input type="text" placeholder="title" name="title" /><br>
        <input type="date" placeholder="date" name="date" /><br>
        <input type="number" placeholder="170070055" name="rollnumber" /><br>
        <input type="file" placeholder="date" name="avatarlocation" /><br>

        <input type="number" name="id" value="` + student[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form> `;
        let ele = $(id);
        ele.after(displayForm);
    }

    function deleteStudent(id, i, a) {

        $.post("API/student/delete.php", {
            delete: true,
            id: id,
            avatar: a
        }, function(result) {
            console.log(result);
            if (result === "Student Deleted successfully") {
                let id = "#stu" + i;
                $(id).css("display", "none");
            }
        });
    }
</script>

</html>