const formAddTask = document.querySelector('#formAddTask');
const tableTasks = document.querySelector('.table');
const inputTaskName = document.querySelector('#inputTaskName');
const checkBoxes = document.querySelectorAll('.form-check-input');
const buttonsDelete = document.querySelectorAll('.btn-danger');
const buttonDeleteAll = document.querySelector('.btn-warning');


const URL_ACTIONS = 'actions.php';

const updateTask = async function(e) {
    await fetch(URL_ACTIONS, {
        method: 'PUT',
        body: JSON.stringify({
            action: 'update_task',
            done: e.target.checked,
            taskId: this.dataset.id,
        })
    })
}

checkBoxes.forEach(checkBox => {
    checkBox.addEventListener('change', updateTask);
})

const deleteTask = async function(e) {
    await fetch(URL_ACTIONS, {
        method: 'PUT',
        body: 
            JSON.stringify({
                action: 'delete_task',
                taskId: this.dataset.id,
            })
    })
}

buttonsDelete.forEach(btnDelete => {
    btnDelete.addEventListener('click', deleteTask);
})



formAddTask.addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(e.target);

    await fetch(URL_ACTIONS, {
        method: 'POST',
        body: formData

    })


        .then(data => data.json())
        .then(json => {
            if (json.code !== 'ADD_TASK_OK') return;

            const row = tableTasks.insertRow();
            const firstCell = row.insertCell();
            const secondCell = row.insertCell();
            const thirdCell = row.insertCell();

            firstCell.classList.add('text-center');

            const checkbox = document.createElement('input');
            const taskName = document.createTextNode(json.taskName);
            const deleteTaskBtn = document.createElement('button');

            checkbox.type = 'checkbox';
            checkbox.addEventListener('change', updateTask);
            checkbox.classList.add('form-check-input');
            checkbox.dataset.id = json.taskId;

            deleteTaskBtn.type = 'button';
            deleteTaskBtn.addEventListener('click', deleteTask);
            deleteTaskBtn.classList.add('btn');
            deleteTaskBtn.classList.add('btn-danger');
            deleteTaskBtn.dataset.id = json.taskId;
            deleteTaskBtn.innerHTML = "X";

            firstCell.appendChild(checkbox);
            secondCell.appendChild(taskName);
            thirdCell.appendChild(deleteTaskBtn);

            inputTaskName.value = '';
        })
        
})

buttonDeleteAll.addEventListener('click', async function(e) {
    e.preventDefault();

    await fetch(URL_ACTIONS, {
        method: 'PUT',
        body: 
            JSON.stringify({
                action: 'delete_all_tasks',
            })
        })
    
    .then(data => data.json())
    .then(json => {
        if (json.code !== 'DELETE_ALL_TASKS_OK') return;
    })
    
})