<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $datetime1 = new DateTime('2016-10-11');
    $datetime2 = new DateTime('2017-12-01');
    $interval = $datetime1->diff($datetime2);
    echo "<br>";
    echo floor(($interval->format('%a') / 7)) . ' semanas con '
        . ($interval->format('%a') % 7) . ' días';

    ?>

</body>

</html>