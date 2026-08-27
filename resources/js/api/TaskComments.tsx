export const getComments = async (taskId: number) => {
  const res = await fetch(`/api/tasks/${taskId}/comments`);
  if (!res.ok) throw new Error("コメントの取得に失敗しました");
  const result = await res.json();
  return result.data;
}
