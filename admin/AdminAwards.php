<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .award {
            border: 1px solid black;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <h1>Fetch all awards</h1>
    <p>get data</p>
    <div class="awards">
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the articles

    $("p").click(function() {
        GetAwards();
    });

    function GetAwards() {
        $.post("API/award/fetch.php", {
            edit: false,
            delete: false,
            data: "All"
        }, function(result) {
            DisplayAwards(result);
        });
    }

    let awards;

    function DisplayAwards(obj) {
        let ele = $(".awards");
        awards = JSON.parse(obj);
        for (let i = 0; i < awards.length; i++) {
            let displayElement = `<div class='award' id='art` + i + `'>
                <p>id: ` + awards[i].id + `</p>
                <p>title: ` + awards[i].title + `</p>
                <p>date: ` + awards[i].date + `</p>
                <p>description: ` + awards[i].description + `</p>
                <p onclick="editStart( 'art` + i + `' , ` + i + ` )">edit</p>
                <p onClick="deleteAwards(` + awards[i].id + `, ` + i + ` )">delete</p>
            </div>`;
            ele.after(displayElement);
        }
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `    <form action="API/award/update.php"  method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="` + awards[i].title + `"  /><br>
        <input type="text" name="description" value=" ` + awards[i].description + `" /><br>
        <input type="date" name="date" value=" ` + awards[i].date + ` " /><br>
        <input type="number" name="id" value="` + awards[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form> `;
        let ele = $(id);
        ele.after(displayForm);
    }

    function deleteAwards(id, i) {
        $.post("API/award/delete.php", {
            delete: true,
            id: id
        }, function(result) {
            console.log(result);
            if (result === "Article Deleted successfully") {
                // delete the element with id artid
                let id = "#art" + i;
                $(id).css("display", "none");
            }
        });
    }
</script>

</html>