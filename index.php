<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./jquery-1.9.1.js"></script>
    <script src="./index.js"></script>
    <style>
        section {
            display: flex;
            justify-content: space-around;
            border: 1px solid black;
            padding: 5px;
        }

        .input {
            border-top: 1px solid black;
            display: flex;
            padding: 5px;
            justify-content: space-around;
        }

        .i-1 {
            margin-right: 5px;
            border-left: 2px solid black;
        }

        .i-2 {
            border-inline: 2px solid black;
            padding-inline: 5px;
        }

        .i-3 {
            margin-left: 5px;
            border-right: 2px solid black;
        }

        ul {
            list-style-type: none;
            padding: 0px;
            list-style-position: inside;
            margin: 0px;
            display: block ruby;
        }

        li {
            float: left !important;
            margin: 10px;
            margin-inline: 10px;
            border: 1px solid black;
            padding: 5px;

        }

        .title {
            border-bottom: 1px solid black;
            display: flex;
            justify-content: space-around;
            padding: 5px;
        }

        a {
            text-decoration: none;
            color: black;
            /* border-right: 1px solid black; */
        }

        button {
            /* border-left: 1px solid black; */
            border: 0px;
            background-color: white;
            color: black;
            cursor: pointer;
            margin: 0px;
            padding: 0px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <button onclick="home()" style="height:10px;width:10px;"></button>
    <section>
        <div id="back"></div>
        <div id="dir"></div>
    </section>
    <br>
    <ul id="list"></ul>
    <br>
    <div>
        <?php include("./file_upload.php"); ?>
    </div>
</body>

</html>