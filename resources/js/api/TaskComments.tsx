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
