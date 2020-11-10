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
    <h1>Awards</h1>
    <button id="fetch">Fetch</button>
    <div id="awards"></div>


</body>
<script src="./jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the articles

    $("#fetch").click(function() {
        GetAwards();
    });

    function GetAwards() {
        $.post("api/awards/fetch.php", {
            edit: false,
            delete: false,
            data: "All"
        }, function(result) {
            DisplayAwards(result);
        });
    }

    let awards;

    function DisplayAwards(obj) {
        awards = JSON.parse(obj);
        let displayElement = '';
        for (let i = 0; i < awards.length; i++) {
            displayElement += `<div class='award' id='art` + i + `'>
                <p>id: ` + awards[i].id + `</p>
                <p>title: ` + awards[i].title + `</p>
                <p>date: ` + awards[i].date + `</p>
                <p>description: ` + awards[i].description + `</p>
                <button onclick="editStart( 'art` + i + `' , ` + i + ` )">Edit</button>
                <button onClick="deleteAwards(` + awards[i].id + `, ` + i + ` )">Delete</button>
            </div>`;
        }
        $('#awards').html(displayElement);
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `<form action="api/awards/update.php"  method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="` + awards[i].title + `"  /><br>
        <input type="text" name="description" value="` + awards[i].description + `" /><br>
        <input type="date" name="date" value="` + awards[i].date + ` " /><br>
        <input type="number" name="id" value="` + awards[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form> `;
        let ele = $(id);
        ele.after(displayForm);
    }

    function deleteAwards(id, i) {
        $.post("api/awards/delete.php", {
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