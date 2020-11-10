<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .news {
            border: 1px solid black;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <h1>News</h1>
    <button id='fetch'>Fetch</button>
    <div id="news">
    </div>


</body>
<script src="./jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the news

    $("#fetch").click(function() {
        GetNews();
    });

    function GetNews() {
        $.post("api/news/fetch.php", {
            edit: false,
            delete: false,
            data: "All"
        }, function(result) {
            DisplayNews(result);
        });
    }

    let news;

    function DisplayNews(obj) {
        let ele = $(".news");
        let displayElement = '';
        news = JSON.parse(obj);
        for (let i = 0; i < news.length; i++) {
            displayElement += `<div class='news_item' id='stu` + i + `'>
                <p>id: ` + news[i].id + `</p>
                <p>id: ` + news[i].title + `</p>
                <button onclick="editStart( 'stu` + i + `' , ` + i + ` )">Edit</button>
                <button onClick="deleteStudent(` + news[i].id + `, ` + i + `)">Delete</button>
            </div>`;
        }
        $('#news').html(displayElement);
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `<form action="api/news/update.php"  method="post" enctype="multipart/form-data">
        <input type="text" value="` + news[i].title + `"name="title" /><br>
        <input type="file" name="newslocation" /><br>
        <input type="number" name="id" value="` + news[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form> `;
        let ele = $(id);
        ele.after(displayForm);
    }

    function deleteStudent(id, i) {
        $.post("api/news/delete.php", {
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