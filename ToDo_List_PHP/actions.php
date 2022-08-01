<?php

include_once 'config.php';

global $db;

$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);

$action = (isset($_POST['action'])) ? $_POST['action'] : $data['action'];

switch ($action) 
{
    case 'add_task' :
        addTask();
        break;

    case 'update_task' :
        updateTask($data);
        break;

    case 'delete_task' :
        deleteTask($data);
        break;

    case 'delete_all_tasks' :
        deleteAllTasks($data);
        break;

    default:

        break;
}

function addTask(): void
{
    global $db;

    if(!isset($_POST['taskName'])) return;

    checkInput($_POST['taskName']);
    
    $db->addTask($_POST['taskName']);

    echo json_encode([
        'code' => 'ADD_TASK_OK',
        'taskId' => $db->getDatabase()->lastInsertRowId(),
        'taskName' => $_POST['taskName'],
    ]);
}

function updateTask(array $data) : void
{
    global $db;

    if(!isset($data['taskId'], $data['done'])) return;

    $db->updateTask(intval($data['taskId']), intval($data['done']));

    echo json_encode([
        'code' => 'UPDATE_TASK_OK'
    ]);
}

function deleteTask(array $data)
{
    global $db;

    if(!isset($data['taskId'])) return;

    $db->deleteTask($data['taskId']);

    echo json_encode([
        'code' => 'DELETE_TASK_OK'
    ]);
}

function deleteAllTasks() : void
{
    global $db;

    $db->deleteAllTasks();

    echo json_encode([
        'code' => 'DELETE_ALL_TASKS_OK'
    ]);
}

function checkInput($data) {

    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}