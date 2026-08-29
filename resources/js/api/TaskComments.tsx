import type { TaskComment } from "../types/task";

export const getComments = async (taskId: number) => {
  const res = await fetch(`/api/tasks/${taskId}/comments`);
  if (!res.ok) throw new Error("コメントの取得に失敗しました");
  const result = await res.json();
  return result.data;
}

export const createComments = async (taskId: number, body: string) => {
  const response = await fetch(`/api/tasks/${taskId}/comments`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN":
        document.querySelector('meta[name="csrf-token"]')?.getAttribute("content") ?? ""
    },
    body: JSON.stringify({ body }),
  });

  if (!response.ok) throw new Error("コメントの投稿に失敗しました");

  const data = await response.json();
  return data.data;
}

export const updateComment = async (commentId: number, body: string): Promise<TaskComment> => {
  const response = await fetch(`/api/comments/${commentId}`, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
      "Accept": "application/json",
      "X-CSrF-TOKEN":
        document.querySelector('meta[name="csrf-token"]')?.getAttribute("content") ?? ""
    },
    body: JSON.stringify({ body }),
  });

  if (!response.ok) throw new Error("コメントの更新に失敗しました");
  const data = await response.json();
  return data.data;
}

export const deleteComment = async (commentId: number): Promise<void> => {
  const response = await fetch(`/api/comments/${commentId}`, {
    method: "DELETE",
    headers: {
      "Accept": "application/json",
      "X-CSrF-TOKEN":
        document.querySelector('meta[name="csrf-token"]')?.getAttribute("content") ?? ""
    },
  });

  if (!response.ok) throw new Error("コメントの削除に失敗しました");
}

export const createReply = async (commentId: number, body: string) => {
  const response = await fetch(`/api/comments/${commentId}/replies`,
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN":
          document.querySelector('meta[name="csrf-token"]')?.getAttribute("content") ?? "",
        "Accept": "application/json"
      },
      body: JSON.stringify({ body }),
    }
  );

  if (!response.ok) throw new Error("返信の投稿に失敗しました");

  return response.json();
}
