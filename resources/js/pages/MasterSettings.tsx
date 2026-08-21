import { useState } from "react";

// =====================型補完==========================
type MasterType = "category" | "type" | "status";

type MasterItem = {
  id: number,
  name: string
};

const initialDate: Record<MasterType, MasterItem[]> = {
  category: [
    { id: 1, name: "開発" },
    { id: 2, name: "デザイン" },
    { id: 3, name: "バグ修正" }
  ],
  type: [
    { id: 1, name: "機能修正" },
    { id: 2, name: "修正" },
    { id: 3, name: "調査" }
  ],
  status: [
    { id: 1, name: "未着手" },
    { id: 2, name: "進行中" },
    { id: 3, name: "完了" }
  ]
};

const titles: Record<MasterType, string> = {
  category: "カテゴリー",
  type: "タイプ",
  status: "ステータス"
}

export default function MasterSettings() {

  // =====================状態管理==========================
  const [data, setData] = useState(initialDate);
  const [activeType, setActiveType] = useState<MasterType>("category");
  const [isOpen, setIsOpen] = useState(false);
  const [name, setName] = useState("");

  const currentItems = data[activeType];

  const handleAdd = () => {
    if (!name.trim()) return;
    const newItem: MasterItem = {
      id: Date.now(),
      name: name.trim()
    };

    setData((prev) => ({...prev, [activeType]: [...prev[activeType], newItem]}));
  }

  return (
    <div>
      <h1>マスタ管理</h1>
    </div>
  )
}
