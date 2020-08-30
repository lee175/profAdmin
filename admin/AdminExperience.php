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
    <h1>Fetch all experiences</h1>
    <p>get data</p>
    <div class="experiences">
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the experience

    $("p").click(function() {
        GetExperience();
    });

    function GetExperience() {
        $.post("API/experience/fetch.php", {
            edit: false,
            delete: false,
            data: "All"
        }, function(result) {
            DisplayExperience(result);
        });
    }

    let experience;

    function DisplayExperience(obj) {
        let ele = $(".experiences");
        experience = JSON.parse(obj);
        for (let i = 0; i < experience.length; i++) {
            let displayElement = `<div class='experience' id='exp` + i + `'>
                <p>id: ` + experience[i].id + `</p>
                <p>position: ` + experience[i].position + `</p>
                <p>description: ` + experience[i].description + `</p>
                <p>Start Date: ` + experience[i].date_start + `</p>
                <p>Start end: ` + experience[i].date_end + `</p>
                <p onclick="editStart( 'art` + i + `' , ` + i + ` )">edit</p>
                <p onClick="deleteExperience(` + experience[i].id + `, ` + i + ` )">delete</p>
            </div>`;
            ele.after(displayElement);
        }
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `    <form action="API/experience/update.php"  method="post" enctype="multipart/form-data">
        <input type="text" value="` + experience[i].position + `" name="position" /><br>
        <input type="text" value="` + experience[i].description + `" name="description" /><br>
        <input type="date" name="sdate" value="` + experience[i].date_start + `" /><br>
        <input type="date" name="edate" value="` + experience[i].date_end + `" /><br>

        <input type="number" name="id" value="` + experience[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form> `;
        let ele = $(id);
        ele.after(displayForm);
    }

    function deleteExperience(id, i) {
        $.post("API/experience/delete.php", {
            delete: true,
            id: id
        }, function(result) {
            console.log(result);
            if (result === "experience Deleted successfully") {
                // delete the element with id artid
                let id = "#exp" + i;
                $(id).css("display", "none");
            }
        });
    }
</script>

</html>