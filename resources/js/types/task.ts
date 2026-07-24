export type Task = {
  id: number;
  task_name: number;
  created_at: string;

  type: {
    id: number;
    type_name: string;
    type_color: string;
  }

  status: {
    id: number;
    status_name: string;
  }
}
