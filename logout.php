<?php
session_start();
$token = md5(session_id());
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(31 41 55);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: red;
        }

        p {
            margin-bottom: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['token']) && $_GET['token'] === $token) {
        session_destroy();
        echo "<p>Logout realizado com sucesso!</p>";
        header("Location: administrador.php");
    } else {
        echo '<button onclick="confirmLogout()">Logout</button>';
    }
    ?>

    <script>
        var token = "<?php echo $token; ?>";

        function confirmLogout() {
            if (confirm("Tem certeza de que deseja fazer logout?")) {
                window.location.href = 'logout.php?token=' + token;
            } else {
                window.location.href = 'administrador.php';
            }
        }
    </script>
</body>

</html>
