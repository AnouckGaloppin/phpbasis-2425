<?php
// print '<pre>';
// print_r($_POST);
// print '</pre>';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//connectie maken met databank (connectie credentials)
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'phpbasis';
$db_port = 8889;

//new PDO (verder opzoeken om dieper te begrijpen)
//onderstaande code maakt enkel een connectie met de databank
//maar geeft niets weer als de connectie is gelukt
try {
    $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    die();
}
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

$errors = [];

//taak toevoegen (indien submit geweest)
$newTask = @$_POST['taak'];
if ($newTask !== null) {
    //validatie doorgestuurde data
    //task moet minstens 3 characters lang zijn.
    if (strlen($newTask) < 3) {
        $errors[] = 'Task naam is te kort...';
    }

    //task mag niet numeriek zijn
    if (is_numeric($newTask)) {
        $errors[] = 'Task naam mag geen getal zijn';
    }

    if (count($errors) == 0) {
        //insert data
        insertTask($newTask);
    }
}

//pas status aan naar 0 indien taakId aanwezig in post
$taakIdToDelete = @$_POST['taakId'];
if ($taakIdToDelete !== null) {
    deleteTask($taakIdToDelete);
}

//haalt alle tasks uit de databank
function getTasks(): array
{
    global $db;
    $sql = "SELECT id, name FROM tasks where status = 1 ORDER BY created DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//taak toevoegen
function insertTask(String $name, int $status = 1)
{
    global $db;
    $sql = "INSERT INTO tasks(name, status) VALUES(':taskname',:status)";
    //:taskname zorgt voor minder risico op SQL-injection
    //onderstaande maakt de query klaar
    $stmt = $db->prepare($sql);
    //onderstaande voert de query uit
    $stmt->execute([
        ':taskname' => $name,
        ':status' => $status
    ]);
}

//taak verwijderen
function deleteTask(int $id, bool $soft = true)
{
    global $db;
    if ($soft) {
        $sql = "UPDATE tasks SET status = 0, updated = CURRENT_TIMESTAMP WHERE id = :id";
    } else {
        $sql = "DELETE FROM tasks WHERE id = :id";
    }
    // print 'hier ga ik iets deleten';
    // exit;
    //onderstaande maakt de query klaar
    $stmt = $db->prepare($sql);
    //onderstaande voert de query uit
    $stmt->execute([
        ':id' => $id
    ]);
}


//toont wat er in de databank zit
// print '<pre>';
// print_r($tasks);
// print '</pre>';
