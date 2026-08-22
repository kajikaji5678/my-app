import { Button } from "@/components/ui/button";
import { Dialog, DialogContent, DialogHeader, DialogTitle } from "@/components/ui/dialog";
import { Input } from "@/components/ui/input";
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from "@/components/ui/table";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
import { act, useEffect, useState } from "react";
import type { MasterItem, MasterType } from "../types/master";
import { createMasterItems, getMasterItems, updateMasterItems, deleteMasterItems } from "../service/masterService";

//* =====================型補完==========================

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

  //* =====================状態管理==========================
  const [data, setData] = useState(initialDate);
  const [activeType, setActiveType] = useState<MasterType>("category");
  const [isOpen, setIsOpen] = useState(false);
  const [name, setName] = useState("");
  const [editingId, setEditingId] = useState<number | null>(null);

  const currentItems = data[activeType];
  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");

  //~ カテゴリーの自動リロード
  useEffect(() => {
    const loadCategories = async () => {
      try {
        const categories = await getMasterItems("category");
        setData((prev) => ({ ...prev, category: categories }));
      } catch (e) {
        console.error(e);
      }
    };

    loadCategories()
  }, []);

  //~ カテゴリーの追加および編集
  const handleSave = async () => {
    try {
      if (editingId === null) {
        const item = await createMasterItems(activeType, name, csrfToken ?? "");
        setData((prev) => ({ ...prev, category: [...prev.category, item] }));
        setName("");
        setIsOpen(false);
      } else {
        const item = await updateMasterItems(activeType, editingId, name, csrfToken ?? "");
        setData((prev) => {
          const updatedItems = prev[activeType].map((nowItem) =>
            nowItem.id === editingId ? item : nowItem
          );
          return {
            ...prev,
            [activeType]: updatedItems,
          };
        });
      }
    } catch (e) {
      console.error(e);
    }
  }

  //~ カテゴリーの削除
  const handleDelete = async (id: number) => {
    try {
      await deleteMasterItems(activeType, csrfToken ?? "", id);
      setData((prev) => ({ ...prev, [activeType]: prev[activeType].filter((item) => item.id !== id) }));
      setName("");
      setEditingId(null);
      setIsOpen(false);
    } catch (e) {
      console.error(e);
    }
  };

  return (
    <div className="flex h-full flex-col gap-6 p-6">
      <div>
        <h1 className="text-2xl font-bold">マスタ管理</h1>
        <p className="text-sm text-muted-foreground">
          カテゴリー・タイプ・ステータスを管理します。
        </p>
      </div>
      <Tabs
        value={activeType}
        onValueChange={(value) => setActiveType(value as MasterType)}
        className="flex flex-1 flex-col"
      >

        <TabsList className="w-fit">
          <TabsTrigger value="category">
            カテゴリー
          </TabsTrigger>

          <TabsTrigger value="type">
            タイプ
          </TabsTrigger>

          <TabsTrigger value="status">
            ステータス
          </TabsTrigger>
        </TabsList>
        <div className="mt-4 flex-1">
          <div className="rounded border bg-white">
            <div className="flex items-center justify-between border-b p-4">
              <h2 className="font-semibold">
                {titles[activeType]}
              </h2>

              <Button onClick={() => { setEditingId(null); setName(""); setIsOpen(true) }}>
                追加
              </Button>
            </div>

            <Table>
              <TableHeader>
                <TableRow>
                  <TableHead>名前</TableHead>
                  <TableHead className="w-[120px]">操作</TableHead>
                </TableRow>
              </TableHeader>

              <TableBody>
                {currentItems.map((item) => (
                  <TableRow key={item.id}>
                    <TableCell>{item.name}</TableCell>
                    <TableCell>
                      <Button
                        className="rounded"
                        variant="outline"
                        size="sm"
                        onClick={() => { setEditingId(item.id); setName(item.name); setIsOpen(true) }}>
                        編集
                      </Button>
                      <Button className="rounded" variant="outline" size="sm" onClick={() => handleDelete(item.id)}>削除</Button>
                    </TableCell>
                  </TableRow>
                ))}
              </TableBody>
            </Table>
          </div>
        </div>
      </Tabs>

      <Dialog open={isOpen} onOpenChange={setIsOpen}>
        <DialogContent>
          <DialogHeader>
            <DialogTitle>
              {titles[activeType]}を追加
            </DialogTitle>
          </DialogHeader>

          <div className="space-y-4">
            <div className="space-y-2">
              <label className="text-sm font-medium">
                名前
              </label>
              <Input
                value={name}
                onChange={(e) => setName(e.target.value)}
                placeholder={`${titles[activeType]}名を入力`}
              />
            </div>
            <div className="flex justify-end gap-2">
              <Button
                variant="outline"
                onClick={() => setIsOpen(false)}
              >
                キャンセル
              </Button>
              <Button onClick={handleSave}>保存</Button>
            </div>
          </div>
        </DialogContent>
      </Dialog>
    </div>
  )
}
