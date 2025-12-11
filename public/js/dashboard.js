const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

$(document).ready(function () {
    loadTasks();

    $("#add_task").click(function () {
        let title = $("#task_title").val().trim();
        if (!title) return showError("Task title cannot be empty.");

        $.ajax({
            url: "/tasks",
            type: "POST",
            data: { title: title, _token: csrfToken },
            success: function (task) {
                addTaskToList(task);
                $("#task_title").val("");
                clearError();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let msg = Object.values(errors).flat().join("<br>");
                    showError(msg);
                }
            },
        });
    });
});

function loadTasks() {
    $.get("/tasks", function (tasks) {
        $("#tasks_list").empty();
        tasks.reverse().forEach((task) => addTaskToList(task));
    });
}

function addTaskToList(task) {
    let li = $(`
        <li class="list-group-item d-flex justify-content-between align-items-center ${
            task.is_completed ? "completed" : ""
        }" id="task_${task.id}">
            <span id="title_${task.id}">${task.title}</span>
            <div>
                <input type="checkbox" class="form-check-input me-2" ${
                    task.is_completed ? "checked" : ""
                } onclick="toggleTask(${task.id})">
            </div>
        </li>
    `);
    $("#tasks_list").prepend(li);
}

function toggleTask(id) {
    $.ajax({
        url: "/tasks/" + id,
        type: "PUT",
        data: { _token: csrfToken },
        success: function (task) {
            let li = $("#task_" + task.id);
            li.toggleClass("completed", task.is_completed);
        },
    });
}

function showError(msg) {
    $("#error_msg").html(msg).fadeIn();
}

function clearError() {
    $("#error_msg").fadeOut(function () {
        $(this).html("");
    });
}
