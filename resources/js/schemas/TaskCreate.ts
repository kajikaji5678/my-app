import { z } from "zod";

export const taskCreateSchema = z.object({
  task_name: z.string().min(1, "タスク名を入力してください"),
  category_id: z.number().optional(),
  type_id: z.number().optional(),
  status_id: z.string({error: "ステータスを入力してください"}).min(1, "ステータスを入力してください"),
  priority: z.string().optional(),
  responsible_user_id: z.number().optional(),
  deadline_at: z.string().optional(),
  real_time: z.number().optional(),
  estimated_time: z.number().optional(),
  schedule: z.string().optional(),
});

export type TaskCreateForm = z.infer<typeof taskCreateSchema>;