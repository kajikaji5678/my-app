import type { MasterItem, MasterType } from "../types/master";

const endpoints: Record<MasterType, string> = {
  category: "/api/categories",
  type: "/api/types",
  status: "/api/status"
};

export async function getMasterItems(type: MasterType): Promise<MasterItem[]> {
  const res = await fetch(endpoints[type], {
    headers: {
      Accept: "application/json"
    }
  });

  const result = await res.json();
  if (!res.ok) throw new Error(result.message ?? "取得失敗");

  return result.data;
};

export async function createMasterItems(
  type: MasterType,
  name: string,
  csrfToken: string
): Promise<MasterItem> {
  const res = await fetch(endpoints[type], {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      "X-CSRF-TOKEN": csrfToken,
    },
    body: JSON.stringify({ name })
  });
  const result = await res.json();
  if (!res.ok) throw new Error(result.message ?? "作成失敗");
  return result.data;
};

export async function updateMasterItems(
  type: MasterType,
  id: number,
  name: string,
  csrfToken: string
): Promise<MasterItem> {
  const res = await fetch(`${endpoints[type]}/${id}`, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      "X-CSRF-TOKEN": csrfToken,
    },
    body: JSON.stringify({ name })
  });
  const result = await res.json();
  if (!res.ok) throw new Error(result.message ?? "更新失敗");
  return result.data;
};

export async function deleteMasterItems(
  type: MasterType,
  csrfToken: string,
  id: number
): Promise<void> {
  const res = await fetch(`${endpoints[type]}/ ${id}`, {
    method: "DELETE",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      "X-CSRF-TOKEN": csrfToken,
    },
    body: JSON.stringify({ name })
  });
  const result = await res.json();
  if (!res.ok) throw new Error(result.message ?? "消去失敗");
  return result.data;
};
