export type Task = {
  id: number;
  task_name: string;

  created_at: string;
  deadline_at: string;

  priority: string;
  status_id: number;

  estimated_time: number;
  real_time: number;

  responsible_user_id: number;

  category: {
    id: number;
    category_name: string;
  }

  status: {
    id: number;
    status_name: string;
  }

  type: {
    id: number;
    type_name: string;
    type_color: string;
  }
}


