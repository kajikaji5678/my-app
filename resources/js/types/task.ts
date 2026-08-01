export type Task = {
  id: number;
  task_name: string;
  created_at: string;
  deadline_at: string;
  priority: string;

  type: {
    id: number;
    type_name: string;
    type_color: string;
  }

  status: {
    id: number;
    status_name: string;
  }

  category: {
    id: number;
    category_name: string;
  }
}


