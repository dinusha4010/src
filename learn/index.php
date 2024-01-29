<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello</h1>

    <?php

// Set the hostname as '/tmp'
$hostname = 'web-dev-env-main-db-1';
// Set the database name as 'ccuser'
$dbname = 'mydb';
// Set the username and password with permissions to the database
$username = 'root';
$password = 'password';


// Create the DSN (data source name) by combining the database type (PostgreSQL), hostname and dbname
$dsn = "mysql:host=$hostname;dbname=$dbname";
// Create a PDO object
$db = new PDO($dsn, $username, $password);
// Create a query to get the id, title, and author, and assign it to $booksQuery
$bookQuery = $db->query('SELECT id,title,author FROM books');

// Fetch one book using the fetch() method and assign it to the $book variable.
$book = $bookQuery->fetch(PDO::FETCH_ASSOC);

// Fetch all books using the fetchAll() method and assign the result to the $books variable.
$books = $bookQuery->fetchAll(PDO::FETCH_ASSOC);

// Loop over the $books array and echo the title of each book, followed by a line break.
foreach($books as $book)
{
echo $book['title'] . "<br>";

}

// Terminate db connection
$db = null;
?>
</body>
</html>