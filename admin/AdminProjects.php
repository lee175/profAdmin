<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .project {
            border: 1px solid black;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <h1>Fetch all projects</h1>
    <p>get data</p>
    <div class="projects">
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the project

    $("p").click(function() {
        GetProject();
    });

    function GetProject() {
        $.post("API/project/fetch.php", {
            edit: false,
            delete: false,
            data: "All"
        }, function(result) {
            DisplayProject(result);
        });
    }

    let project;

    function DisplayProject(obj) {
        let ele = $(".projects");
        project = JSON.parse(obj);
        for (let i = 0; i < project.length; i++) {
            let displayElement = `<div class='project' id='pro` + i + `'>
                <p>id: ` + project[i].id + `</p>
                <p>title: ` + project[i].title + `</p>
                <p>place: ` + project[i].place + `</p>
                <p>role: ` + project[i].role + `</p>
                <p>duration: ` + project[i].duration + `</p>
                <p>date_start: ` + project[i].date_start + `</p>
                <p>date_end: ` + project[i].date_end + `</p>

                <p onclick="editStart( 'art` + i + `' , ` + i + ` )">edit</p>
                <p onClick="deleteProject(` + project[i].id + `, ` + i + ` )">delete</p>
            </div>`;
            ele.after(displayElement);
        }
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `    <form action="API/project/update.php"  method="post" enctype="multipart/form-data">
        <input type="text" value="` + project[i].title + `" name="title" /><br>
        <input type="text" value="` + project[i].place + `" name="place" /><br>
        <input type="text" value="` + project[i].role + `" name="role" /><br>
        <input type="text" value="` + project[i].duration + `" name="duration" /><br>
        <input type="date" name="sdate" value="` + project[i].date_start + `" /><br>
        <input type="date" name="edate" value="` + project[i].date_end + `" /><br>

        <input type="number" name="id" value="` + project[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form> `;
        let ele = $(id);
        ele.after(displayForm);
    }

    function deleteProject(id, i) {
        $.post("API/project/delete.php", {
            delete: true,
            id: id
        }, function(result) {
            console.log(result);
            if (result === "Project Deleted successfully") {
                // delete the element with id artid
                let id = "#pro" + i;
                $(id).css("display", "none");
            }
        });
    }
</script>

</html>