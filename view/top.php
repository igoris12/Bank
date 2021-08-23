
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Bank2</title>
    <style>

        body,
        body * {
            margin: 0;
            padding: 0;
            vertical-align: top;
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            word-break: break-all;
        }
            
        body {
            margin: 20px;
            background-color: #dfdced;
        }

        nav {
            background: gray;
            margin-bottom: 10px;
            padding: 10px;
        }

        a {
        text-decoration: none;
        color: white; 
        margin: auto 10px;
        }

        a:hover {
            color: blue; 
        }

        input {
            margin-bottom: 10px;
        }

        /*  */
            .containerr {
                border: 2px solid black;
                background-color: #cccad5;
                margin-top: 20px;
                border-radius: 4px;
            }

            .containerBtn {
                display: inline-block;
                border-bottom: 2px solid black;
                padding: 10px;
                width: 100%;
            }


            .creatContainer {
                display: inline-block;
                padding: 10px;
                width: 100%;
            }

            .creatContainer input {
                width: 190px;
                font-size: 16px;
                font-weight: 500;
            }

            .inputContent {
                display: inline-block;
                margin-top: 13px;

            }
        
            .infoContainer {
                display: inline-block;
                padding: 10px;
                width: 100%;
            }
            form {
            display: inline-block;
            }

            button {
                display: inline-block;
                background: #adacb0;
                border-radius: 4px;
                border: 1px solid black;
                margin-right: 50px;
                padding: 3px 5px;
                font-size: 16px;
                font-weight: 500;
            }

            button:hover {
                background: #87868b;
                box-shadow: 0px 0px 5px gray;
            
            }
            
            .item {
                display: inline-block;
                border-bottom: 2px solid gray;
                margin: 5px;
                padding: 3px; 
            }

            .actionForm {
                display: inline-block;
            }
            .actionForm  input, button{ 
                margin: 10px;
                font-size: 16px;
                font-weight: 500;
            }
    </style>
</head>
<body>
    <nav>
        <a href="<?= URL ?>">Home</a>
        <a href="<?= URL ?>list">List</a>
        <a href="<?= URL ?>creat">Creat new account</a>
    </nav>


