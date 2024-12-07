<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Опитування</title>
</head>

<body>
    <h1>Опитування: Про книжечки</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $question1 = htmlspecialchars($_POST['question1']);
        $question2 = htmlspecialchars($_POST['question2']);
        $question3 = htmlspecialchars($_POST['question3']);

        $timestamp = date("Y-m-d_H-i-s");
        $fileName = "survey/response_$timestamp.txt";

        $data = "Ім'я: $name\nEmail: $email\n\nВідповіді:\n1. Як часто ви читаєте книги? $question1\n2. Який жанр ви віддаєте перевагу? $question2\n3. Чи купуєте ви книги онлайн? $question3\n";


        if (!file_exists("survey")) {
            mkdir("survey", 0777, true);
        }
        file_put_contents($fileName, $data);
        $futureTime = strtotime('+1 hour');

        echo "<p>Дякую за проходження форми</p>";
        echo "<p>Час та дата заповнення: " . date("Y-m-d H:i:s", $futureTime) . "</p>";
    } else {
        ?>
        <form action="" method="POST">
            <label for="name">Ім'я:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="question1">Як часто ви читаєте книги?</label><br>
            <select id="question1" name="question1" required>
                <option value="Щодня">Щодня</option>
                <option value="Кілька разів на тиждень">Кілька разів на тиждень</option>
                <option value="Рідко">Рідко</option>
                <option value="Ніколи">Ніколи</option>
            </select><br><br>

            <label for="question2">Який жанр ви віддаєте перевагу?</label><br>
            <select id="question2" name="question2" required>
                <option value="Романи">Романи</option>
                <option value="Фантастика">Фантастика</option>
                <option value="Наукові">Наукові</option>
                <option value="Інше">Інше</option>
            </select><br><br>

            <label for="question3">Чи купуєте ви книги онлайн?</label><br>
            <input type="radio" id="yes" name="question3" value="Так" required>
            <label for="yes">Так</label><br>
            <input type="radio" id="no" name="question3" value="Ні" required>
            <label for="no">Ні</label><br><br>

            <button type="submit">Sumbit</button>
        </form>
        <?php
    }
    ?>
</body>

</html>