<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .conference {
            border: 1px solid black;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <h1>Fetch all conferences</h1>
    <p>get data</p>
    <div class="conferences">
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the articles

    $("p").click(function() {
        GetConference();
    });

    function GetConference() {
        $.post("API/conference/Fetch.php", {
            edit: false,
            delete: false,
            data: "All"
        }, function(result) {
            DisplayConference(result);
        });
    }

    let conference;

    function DisplayConference(obj) {
        let ele = $(".conferences");
        conference = JSON.parse(obj);
        for (let i = 0; i < conference.length; i++) {
            let displayElement = `<div class='conference' id='art` + i + `'>
                <p>id: ` + conference[i].id + `</p>
                <p>title: ` + conference[i].title + `</p>
                <p>people: ` + conference[i].people + `</p>
                <p>date: ` + conference[i].date + `</p>
                <p onclick="editStart( 'art` + i + `' , ` + i + ` )">edit</p>
                <p onClick="deleteConference(` + conference[i].id + `, ` + i + ` )">delete</p>
            </div>`;
            ele.after(displayElement);
        }
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `    <form action="API/conference/update.php"  method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="` + conference[i].title + `"  /><br>
        <input type="text" name="people" value=" ` + conference[i].people + `" /><br>
        <input type="date" name="date" value=" ` + conference[i].date + ` " /><br>
        <input type="number" name="id" value="` + conference[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form> `;
        let ele = $(id);
        ele.after(displayForm);
    }


    function deleteConference(id, i) {
        $.post("API/conference/delete.php", {
            delete: true,
            id: id
        }, function(result) {
            console.log(result);
            if (result === "conference Deleted successfully") {
                // delete the element with id artid
                let id = "#art" + i;
                $(id).css("display", "none");
            }
        });
    }
</script>

</html>