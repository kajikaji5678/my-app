export type Task = {
  id?: number;
  task_name: string;
}

//* id === (string | undentifind);
//* task_name === string
//* ? が無い場合は使用する場合絶対必須

function callTaskId(task: Task) {
  return task.id;
}

// callTaskId({id: 1});

//* 使ってないのでアウト


