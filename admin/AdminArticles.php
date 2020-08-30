<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .article {
            border: 1px solid black;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <h1>Fetch all articles</h1>
    <p>get data</p>
    <div class="articles">
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the articles

    $("p").click(function() {
        GetArticles();
    });

    function GetArticles() {
        $.post("API/article/Fetch.php", {
            edit: false,
            delete: false,
            data: "All"
        }, function(result) {
            DisplayArticles(result);
        });
    }

    let articles;

    function DisplayArticles(obj) {
        let ele = $(".articles");
        articles = JSON.parse(obj);
        for (let i = 0; i < articles.length; i++) {
            let displayElement = `<div class='article' id='art` + i + `'>
                <p>id: ` + articles[i].id + `</p>
                <p>id: ` + articles[i].title + `</p>
                <p>id: ` + articles[i].date + `</p>
                <p>id: ` + articles[i].authors + `</p>
                <p onclick="editStart( 'art` + i + `' , ` + i + ` )">edit</p>
                <p onClick="deleteArticle(` + articles[i].id + `, ` + i + ` )">delete</p>
            </div>`;
            ele.after(displayElement);
        }
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `    <form action="API/article/Update.php"  method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="` + articles[i].title + `"  /><br>
        <input type="text" name="authors" value=" ` + articles[i].authors + `" /><br>
        <input type="date" name="date" value=" ` + articles[i].date + ` " /><br>
        <input type="number" name="id" value="` + articles[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form> `;
        let ele = $(id);
        ele.after(displayForm);
    }

    function deleteArticle(id, i) {
        $.post("API/article//delete.php", {
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