<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .publication {
            border: 1px solid black;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <h1>Publications</h1>
    <button id="fetch">Fetch</button>
    <div id="publications">
    </div>


</body>
<script src="./jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the publication

    $("#fetch").click(function() {
        GetPublication();
    });

    function GetPublication() {
        $.post("api/publications/fetch.php", {
            edit: false,
            delete: false,
            data: "All"
        }, function(result) {
            DisplayPublication(result);
        });
    }

    let publication;

    function DisplayPublication(obj) {
        publication = JSON.parse(obj);
        let displayElement = '';
        for (let i = 0; i < publication.length; i++) {
            displayElement += `<div class='publication' id='pub` + i + `'>
                <p>type: ` + publication[i].type + `</p>
                <p>title: ` + publication[i].title + `</p>
                <p>authors: ` + publication[i].authors + `</p>
                <p>place: ` + publication[i].place + `</p>
                <p>description: ` + publication[i].description + `</p>
                <p>date: ` + publication[i].date + `</p>

                <button onclick="editStart( 'pub` + i + `' , ` + i + ` )">Edit</button>
                <button onClick="deletePublication(` + publication[i].id + `, ` + i + ` )">Delete</button>
            </div>`;
        }
        $('#publications').html(displayElement);
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `<form action="api/publications/update.php" method="post" enctype="multipart/form-data">
        <select name="type">
            <option value='article'>Article</option>
            <option value='book'>Book</option>
            <option value='conference'>Conference</option>
            <option value='journal'>Journal</option>
            <option value='news'>News</option>
        <select>
        <br>
        <input type="text" name="title" value="` + publication[i].title + `"  /><br>
        <input type="text" name="authors" value="` + publication[i].authors + `" /><br>
        <input type="text" name="place" value="` + publication[i].place + `" /><br>
        <input type="text" name="description" value="` + publication[i].description + `" /><br>
        <input type="date" name="date" value="` + publication[i].date + `" /><br>
        <input type="number" name="id" value="` + publication[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form> 
        `;
        let ele = $(id);
        ele.after(displayForm);
    }

    function deletePublication(id, i) {
        $.post("api/publications/delete.php", {
            delete: true,
            id: id
        }, function(result) {
            if (result === "Success") {
                let id = "#pub" + i;
                $(id).css("display", "none");
            }
        });
    }
</script>

</html>