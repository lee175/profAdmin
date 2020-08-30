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
    <h1>Fetch all publications</h1>
    <p>get data</p>
    <div class="publications">
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the publication

    $("p").click(function() {
        GetPublication();
    });

    function GetPublication() {
        $.post("API/publication/fetch.php", {
            edit: false,
            delete: false,
            data: "All"
        }, function(result) {
            DisplayPublication(result);
        });
    }

    let publication;

    function DisplayPublication(obj) {
        let ele = $(".publications");
        publication = JSON.parse(obj);
        for (let i = 0; i < publication.length; i++) {
            let displayElement = `<div class='publication' id='pub` + i + `'>
                <p>id: ` + publication[i].id + `</p>
                <p>title: ` + publication[i].title + `</p>
                <p>authors: ` + publication[i].authors + `</p>
                <p>journal: ` + publication[i].journal + `</p>
                <p>description: ` + publication[i].description + `</p>

                <p onclick="editStart( 'pub` + i + `' , ` + i + ` )">edit</p>
                <p onClick="deletePublication(` + publication[i].id + `, ` + i + ` )">delete</p>
            </div>`;
            ele.after(displayElement);
        }
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `    <form action="API/article/Update.php"  method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="` + publication[i].title + `"  /><br>
        <input type="text" name="authors" value=" ` + publication[i].authors + `" /><br>
        <input type="date" name="date" value=" ` + publication[i].date + ` " /><br>
        <input type="number" name="id" value="` + publication[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form> `;
        let ele = $(id);
        ele.after(displayForm);
    }

    function deletePublication(id, i) {
        $.post("API/publication/delete.php", {
            delete: true,
            id: id
        }, function(result) {
            console.log(result);
            if (result === "Publication Deleted successfully") {
                // delete the element with id artid
                let id = "#pub" + i;
                $(id).css("display", "none");
            }
        });
    }
</script>

</html>