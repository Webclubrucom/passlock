async function tasksAdd() {
    var tasks = document.getElementById('tasks');
    
    document.getElementById('task-add').onclick = function () {
        var input = document.getElementById('input-taks').value;
        
        var task_error = document.getElementById('task_error');
        if(input != ''){
            var formData = new FormData();
            formData.append('add-task', input);
    
            $.ajax({
                url: 'core/models/tasksJS.php',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {},
                success: function (result) {
                    tasks.innerHTML = result;
                    delTasks();
                    taskCheck();
                    task_error.innerHTML = '';
                    document.getElementById('input-taks').value = '';
                }
            })
        } else {
            task_error.innerHTML = 'Напишите название задачи';
        }
        
    }
    /*var inputAdd = document.getElementById('input-taks');
    inputAdd.addEventListener('keydown', function(e) {
        if (e.keyCode === 13) {
            var input = inputAdd.value;
            
            var task_error = document.getElementById('task_error');
            if(input != ''){
                var formData = new FormData();
                formData.append('add-task', input);

                $.ajax({
                    url: 'core/models/tasksJS.php',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {},
                    success: function (result) {
                        tasks.innerHTML = result;
                        delTasks();
                        taskCheck();
                        task_error.innerHTML = '';
                        document.getElementById('input-taks').value = '';
                    }
                })
            } else {
                task_error.innerHTML = 'Напишите название задачи';
            }
        }
    });*/
	
	
	

    
}
tasksAdd();

async function taskCheck() {
	
	const taskAll = document.querySelectorAll('.task-item'); 
	
	for (let y = 0; y < taskAll.length; y++) {

		const task = taskAll[y];
		
		
		var check = task.querySelector('.form-check-input');
		
		check.addEventListener('change', function (e) {
		var label_task = task.querySelector('label');
		
			var idCheck = e.target.dataset.id;
			
			if(e.target.checked){
				label_task.style.textDecoration = 'line-through';

				var formData = new FormData();

				formData.append('check_task', idCheck);
				$.ajax({
					type: "POST",
					url: 'core/models/tasksJS.php',
					cache: false,
					contentType: false,
					processData: false,
					data: formData,
					beforeSend: function () {},
					success: function (result) {}

				});

			} else {
				
			
				label_task.style.textDecoration = 'none';

				var formData = new FormData();

				formData.append('uncheck_task', idCheck);
				$.ajax({
					type: "POST",
					url: 'core/models/tasksJS.php',
					cache: false,
					contentType: false,
					processData: false,
					data: formData,
					beforeSend: function () {},
					success: function (result) {}

				});
			}
		})



	}

}
taskCheck();

async function delTasks() {
    var tasks = document.getElementById('tasks');
    const delete_taskAll = document.querySelectorAll('.delete'); 

	for (let y = 0; y < delete_taskAll.length; y++) {

		const delete_task = delete_taskAll[y];
        
		
		delete_task.addEventListener('click', function (e) {

			var idCheck = delete_task.dataset.del;
            
            var formData = new FormData();

            formData.append('delete_task', idCheck);
            $.ajax({
                type: "POST",
                url: 'core/models/tasksJS.php',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                beforeSend: function () {},
                success: function (result) {
                    tasks.innerHTML = result;
                    taskCheck();
                    delTasks();
                    tasksAdd();
                    
                }

            });

			
		})

	}
}
delTasks();