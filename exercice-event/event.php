<?php
/**
 * Event controller
 */
require_once 'autoload.php';

function index()
{
    $db = new ch\comem\databaseEvent();
    $events = $db->selectAllEvents();
    $db = new ch\comem\databaseEventSubscribe();
    $eventSubscribes = $db->selectAllEventSubscribes();
    require_once 'ch/comem/views/v-index.php';
}

function show(string $id)
{
    $db = new ch\comem\databaseEvent();
    $event = $db->selectOneEvent($id);
    $db = new ch\comem\databaseEventSubscribe();
    $eventSubscribes = $db->selectAllEventSubscribes();
    require_once 'ch/comem/views/v-show.php';
}

function create()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
        $startTime = filter_input(INPUT_POST, 'startTime', FILTER_SANITIZE_STRING);
        $endTime = filter_input(INPUT_POST, 'endTime', FILTER_SANITIZE_STRING);
        $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
        $db = new ch\comem\databaseEvent();
        $db->insertEvent($title, $description, $date, $startTime, $endTime, $location);
        header('Location: index.php');
        exit;
    }
    else {
        require_once 'ch/comem/views/v-create.php';
    }
}

function subscribe(string $id)
{
    session_start();
    $idMember = $_SESSION['member']['id'];
    $db = new ch\comem\databaseEventSubscribe();
    $db->insertEventSubscribe($id, $idMember);
    header('Location: index.php');
    exit;
}

function unsubscribe(string $id)
{
    session_start();
    $idMember = $_SESSION['member']['id'];
    $db = new ch\comem\databaseEventSubscribe();
    $eventSubscribe = $db->selectOneEventSubscribeByEventAndMember($id, $idMember);
    $db->deleteEventSubscribe($eventSubscribe['id']);
    header('Location: index.php');
    exit;
}

function update(string $id)
{
    $db = new ch\comem\databaseEvent();
    $event = $db->selectOneEvent($id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
        $startTime = filter_input(INPUT_POST, 'startTime', FILTER_SANITIZE_STRING);
        $endTime = filter_input(INPUT_POST, 'endTime', FILTER_SANITIZE_STRING);
        $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
        $db->updateEvent($id, $title, $description, $date, $startTime, $endTime, $location);
        header('Location: index.php');
        exit;
    }
    else {
        require_once 'ch/comem/views/v-update.php';
    }
}

function delete(string $id)
{
    $db = new ch\comem\databaseEvent();
    $db->deleteEvent($id);
    header('Location: index.php');
    exit;
}


