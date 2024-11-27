<?php

// CONNECTIE MAKEN MET DE DB
function connectToDB()
{
    // CONNECTIE CREDENTIALS
    $db_host = '127.0.0.1';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'newsletters';  //dit is de naam vd databank die gebruikt wordt (project-specifiek)
    $db_port = 8889;

    try {
        $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password); //connectie-link
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        die();
    }
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    return $db;
}


// HAAL ALLE NEWS ITEMS OP UIT DE DB
function getNewsItems(): array
{
    $sql = "SELECT newsitems.*, authors.name as author_name FROM newsitems
    LEFT JOIN authors
    ON newsitems.author_id = authors.id;";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// HAAL HET NEWS ITEM MET SPECIFIEKE ID OP
function getNewsItemById(int $id): array|bool
{
    $sql = "SELECT newsitems.*, authors.name as author_name FROM newsitems
    LEFT JOIN authors
    ON newsitems.author_id = authors.id
    WHERE newsitems.id = :id;";

    $stmt = connectToDB()->prepare($sql); //de query $sql die hierboven geschreven is gaat uitgevoerd worden op de db in connectToDB()
    $stmt->execute([
        ":id" => $id
    ]);  //de query wordt uitgevoerd, ":id" => $id maakt duidelijk dat :id in de query verwijst naar $id die met de functie wordt meegegeven.
    return $stmt->fetch(PDO::FETCH_ASSOC); //FETCH_ASSOC geeft een array van arrays met de info die gevraagd wordt met de query
}

function insertNewsItem(String $title, String $body, int $author = null, int $status = 1, String $publication_date): bool|int
{
    $db = connectToDB();
    $sql = "INSERT INTO newsitems(title, body, author_id, status, publication_date) VALUES (:title, :body, :author_id, :status, :publication_date)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':body' => $body,
        ':author_id' => $author,
        ':status' => $status,
        ':status' => $status
    ]);
    return $db->lastInsertId();
}

// UPDATE 1 SPECIFIEK RECORD BY ID
function updateNewsItem(int $id, String $title, String $body, int $author = null, int $status = 1): bool|int
{
    $db = connectToDB();
    $sql = "UPDATE newsitems 
        SET title = :title, body=:body, author_id = :author_id, status = :status, update_date = CURRENT_TIMESTAMP
        WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':body' => $body,
        ':author_id' => $author,
        ':status' => $status,
        ':id' => $id,
    ]);
    $success = (bool)$stmt->rowCount();
    return $success ? $id : false;
}

// HAAL ALLE AUTHORS OP UIT DE DB
function getAuthors(): array // : array verwijst naar het feit dat de output vd function een array MOET zijn, doet zelf niets.
{
    $sql = "SELECT * FROM authors ORDER BY name ASC";
    $stmt = connectToDB()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_KEY_PAIR); //FETCH_KEY_PAIR wordt gebruikt bij tabellen met maar 2 kolommen. De ID wordt automatisch gebruikt als KEY.
}
