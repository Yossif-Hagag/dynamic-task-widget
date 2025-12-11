<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <div class="py-5 back">
        <div class="container">

            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-primary fs-4 text-white d-flex align-items-center">
                    <i class="fas fa-tasks me-2"></i> My Tasks
                </div>

                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" id="task_title" class="form-control rounded-start"
                            placeholder="Enter a new task">
                        <button id="add_task" class="btn btn-success">
                            <i class="fas fa-plus me-1"></i> Add
                        </button>
                    </div>

                    <div id="error_msg" class="text-danger mb-3"></div>

                    <ul id="tasks_list" class="list-group list-group-flush"></ul>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
</x-app-layout>
