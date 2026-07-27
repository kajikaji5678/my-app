import type { Task } from "../types/task";

const API_URL = "/api/tasks";

export async function updateTask(task: Task) {
  const res = await fetch (`${API_URL}/${task.ids}`, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(task),
  });

  if (!res.ok) throw new Error("更新失敗");

  return res.json();
}
