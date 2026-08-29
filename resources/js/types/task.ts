export type Task = {
  id: number;
  task_name: string;

  created_at: string;
  deadline_at: string;

  priority: string;
  status_id: number;

  estimated_time: number;
  real_time: number;
  schedule: string;

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

export type TaskFormData = {
  category_id: number;
  deadline_at: string;
  status_id: number;
  schedule: string;
  estimated_time: number;
  real_time: number
};

export type TaskComment = {
  id: number;
  body: string;
  user: {
    id: number;
    name: string;
  }
  created_at: string
  parent_id: number | null;
  replies: Comment[];
}
