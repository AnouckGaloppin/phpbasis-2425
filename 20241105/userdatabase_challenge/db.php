<?php
// print '<pre>';
// print_r($_POST);
// print '<pre>';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// connectie maken met databank (connectie credentials)
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'phpbasis';
$db_port = 8889;

try {
    $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    die();
}
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

$errors = [];

//check of formulier in vorige stap verzonden werd
$newUser = @$_POST['verzenden'];
if ($newUser !== null) {
    //validatie voor voornaam
    $firstname = @$_POST['firstname'];
    if (strlen($firstname) > 100) {
        $errors[] = 'Gelieve een voornaam in te vullen.';
    } else if (strlen($firstname) == 0) {
        $errors[] = 'Gelieve een voornaam in te vullen.';
    }

    //validatie voor naam
    $lastname = @$_POST['lastname'];
    if (strlen($lastname) > 100) {
        $errors[] = 'Gelieve een achternaam in te vullen.';
    } else if (strlen($lastname) == 0) {
        $errors[] = 'Gelieve een achternaam in te vullen.';
    }

    //validatie voor gebruikersnaam
    $username = @$_POST['username'];
    if (strlen($username) > 20) {
        $errors[] = 'Gelieve een gebruikersnaam in te vullen.';
    } else if (strlen($username) == 0) {
        $errors[] = 'Gelieve een gebruikersnaam in te vullen.';
    } else if (usernameExists($username)) {
        $errors[] = 'Gelieve een unieke gebruikersnaam in te vullen';
    }

    //validatie voor geslacht
    $gender = @$_POST['gender'];
    if (!in_array($gender, ['f', 'm', 'x'])) {
        $errors[] = 'Gelieve je geslacht te selecteren.';
    }

    //TODO ALLE ANDERE VALIDATIES

    // if (is_numeric($newUser)) {
    //     $errors[] = 'Dit mag geen nummer zijn';
    // }

    if (count($errors) == 0) {
        insertMember($firstname, $lastname, $username, $gender);
        //hier weten we dat alles ok is, insert into DB!
    }
}


if (@$_POST['delete'] !== null) {
    deleteMember(@$_POST['memberId']);
}

function getMembers(): array
{
    global $db;
    $sql = "SELECT id, firstname, lastname, username, gender FROM members ORDER BY created DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertMember($firstname, $lastname, $username, $gender)
{
    global $db;
    $sql = "INSERT INTO members(firstname, lastname, username, gender) 
    VALUES(:membervoornaam,:membernaam,:memberusername, :membergender)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':membervoornaam' => $firstname,
        ':membernaam' => $lastname,
        ':memberusername' => $username,
        ':membergender' => $gender
    ]);
}

function deleteMember($id)
{
    global $db;
    $sql = "DELETE from members WHERE id=$id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}

function usernameExists($username): bool
{
    global $db;
    $sql = "SELECT username FROM members WHERE username='$username'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $foundMember = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return sizeof($foundMember) != 0;
}
