<?php
declare(strict_types=1);

require_once 'Post.php';
require_once 'PostLoader.php';

$title = $date = $content = $name = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['title'])) {
        echo '<div class="alert alert-danger" role="alert">Title is a required field</div>';
    } else {
        $title = htmlspecialchars($_POST['title']);
    }

    if (empty($_POST['date'])) {
        echo '<div class="alert alert-danger" role="alert">Date is a required field</div>';
    } else {
        $date = htmlspecialchars($_POST['date']);
    }

    if (empty($_POST['content'])) {
        echo '<div class="alert alert-danger" role="alert">Content is a required field</div>';
    } else {
        $content = htmlspecialchars($_POST['content']);
    }

    if (empty($_POST['name'])) {
        echo '<div class="alert alert-danger" role="alert">Name is a required field</div>';
    } else {
        $name = htmlspecialchars($_POST['name']);
    }
}

$postLoader = new PostLoader();

$messages = $postLoader->read();

if ($title != '' && $date != '' && $content != '' && $name != '') {

    $post = new Post($title, $date, $content, $name);
    $postLoader->write($post);
    //$messages = $postLoader->read(); //OR reload the page !

    header('location: index.php');
    exit;
}

$counter = 0;
$messages = array_reverse($messages);
foreach ($messages as $message){
    echo '<div class="container">' . $message->getTitle() . '</div>';
    echo '<div class="container">' . $message->getDate() . '</div>';
    echo '<div class="container">' . $message->getContent() . '</div>';
    echo '<div class="container">' . $message->getAuthorName() . '</div>';
    echo '<hr>';
    $counter++;
    if ($counter == 5){
        break;
    }
}

?>

<!doctype html>

<head>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>GuestBook</title>
</head>

<body>

<header></header>

<h3 style="margin-left: 500px">Welcome to our GuestBook !</h3>

<form action="index.php" method="post" name="guestbook" class="container" style="margin-left: 500px">

    Title: <input type="text" name="title"> <br>

    Date: <input type="date" name="date"> <br>

    Content: <input type="text" name="content"> <br>

    Author Name: <input type="text" name="name"> <br>

    <input type="submit" value="Sign this in the Book">

</form>


<footer></footer>

</body>


