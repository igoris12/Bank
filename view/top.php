
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

        .logout {
            background: none;
            border: none;
            margin: 0;
            
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

            .loginContainer {
                width: 100%;
                margin-top: 30px;
                text-align: center;
            }

           .login {
                width:20%;
                padding: 30px 0px;
                text-align: center;
                border-radius: 5px;
                background: #cccad5;
                border: 2px solid black;
            }

            .loginEmail label {
                width: 100px;
            }

             .loginPass label {
                width: 100px;
            }

            .regDiv {
                width: 100%;
                text-align: center;
                padding: 15px;
            }

            .reg {
                width: 30%;
                border: 2px solid black;
                border-radius: 5px;
                text-align: center;
                padding: 15px;
                background: #cccad5;
            }

            @media  (max-width: 750px) {
                .reg {
                width: 70%;
            }

            @media  (max-width: 990px) {
            .login{
                width: 30%;
            }

            @media  (max-width: 690px) {
            .login{
                width: 50%;
            }

            @media  (max-width:400px) {
            .login{
                width: 100%;
            }
}

          
    </style>
</head>
<body>
    <nav>
        <a href="<?= URL ?>">Home</a>
        <?php if (isLogged()): ?> 
            <a href="<?= URL ?>list">List</a>
            <a href="<?= URL ?>creat">Creat new account</a>
             <form class="logout-form" action="<?= URL ?>logout" method="post">
                <button type="submit" class="logout"><b>Atsijungti</b></button>
            </form>
            
        <?php else : ?>
            <a href="<?= URL ?>login">Login</a>
            <a href="<?= URL ?>registrate">Registrate</a>
        <?php endif ?>
    </nav>
    <?php showMessage();


