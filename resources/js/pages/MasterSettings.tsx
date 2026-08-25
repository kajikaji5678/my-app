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
  category: [],
  type: [],
  status: []
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
  // トグル
  const [isOpen, setIsOpen] = useState(false);
  // 入力フォームに既知の内容を入れるか
  const [name, setName] = useState("");
  // 現在編集している項目のID
  const [editingId, setEditingId] = useState<number | null>(null);
  // 消去確認ボタン
  const [isDelete, setIsDelete] = useState(false);

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

    const loadTypes = async () => {
      try {
        const types = await getMasterItems("type");
        setData((prev) => ({ ...prev, type: types }));
      } catch (e) {
        console.error(e);
      }
    }

    const loadStatuses = async () => {
      try {
        const statuses = await getMasterItems("status");
        setData((prev) => ({ ...prev, status: statuses }));
      } catch (e) {
        console.error(e);
      }
    }

    loadTypes();
    loadCategories();
    loadStatuses();
  }, []);

  //~ カテゴリーの追加および編集
  const handleSave = async () => {
    try {
      if (editingId === null) {
        const item = await createMasterItems(activeType, name, csrfToken ?? "");
        setData((prev) => ({ ...prev, [activeType]: [...prev[activeType], item] }));
        setName("");
        setIsOpen(false);
      } else {
        const item = await updateMasterItems(activeType, editingId, name, csrfToken ?? "");
        setData((prev) => ({
          ...prev,
          [activeType]: prev[activeType].map((nowItem) =>
            nowItem.id === editingId ? item : nowItem
          ),
        }));
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
      setIsDelete(false);
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
          {(Object.keys(titles) as MasterType[]).map((item) => {
            return (
              <TabsTrigger
                key={item}
                value={item}
                className="data-[state=active]:bg-blue-300 px-3 py-2 bg-white rounded-lg [&:not(:first-child)]:ml-3"
              >
                {titles[item]}
              </TabsTrigger>
            )
          })}
        </TabsList>
        <div className="mt-4 flex-1">
          <div className="rounded bg-white w-1/2 border-2">
            <div className="border-b-2 flex items-center justify-between p-4">
              <h2 className="font-semibold">
                {titles[activeType]}
              </h2>

              <Button onClick={() => { setEditingId(null); setName(""); setIsOpen(true); setIsDelete(false)}}>
                追加
              </Button>
            </div>

            <Table>
              <TableHeader className="border-b-2">
                <TableRow>
                  <TableHead>名前</TableHead>
                  <TableHead className="w-[120px]">操作</TableHead>
                </TableRow>
              </TableHeader>

              <TableBody className="overflow-y-auto">
                {currentItems.map((item) => (
                  <TableRow key={item.id}>
                    <TableCell>{item.name}</TableCell>
                    <TableCell>
                      <Button
                        className="rounded border-2 border-blue-200 hover:border-blue-400"
                        variant="outline"
                        size="sm"
                        onClick={() => { setEditingId(item.id); setName(item.name); setIsOpen(true); setIsDelete(false) }}>
                        編集
                      </Button>
                      <Button
                        className="rounded ml-2 border-2 border-red-200 hover:border-red-400"
                        variant="outline"
                        size="sm"
                        onClick={() => {
                          setEditingId(item.id);
                          setName(item.name);
                          setIsDelete(true);
                          setIsOpen(true);
                        }}>
                        削除
                      </Button>
                    </TableCell>
                  </TableRow>
                ))}
              </TableBody>
            </Table>
          </div>
        </div>
      </Tabs>

      <Dialog open={isOpen} onOpenChange={setIsOpen}>
        <DialogContent className={isDelete ? "border-2 border-red-400 bg-white" : "border-2 border-blue-400 bg-white"}>
          <DialogHeader>
            <DialogTitle>
              {isDelete
                ? `${titles[activeType]}を削除`
                : editingId === null
                  ? `${titles[activeType]}を追加`
                  : `${titles[activeType]}を編集`}
            </DialogTitle>
          </DialogHeader>
          {isDelete ? (
            <div className="space-y-4">
              <p>「<span className="font-bold">{name}</span>を削除してもよろしいでしょうか？」</p>
              <div className="flex justify-end gap-2">
                <Button
                  variant="outline"
                  className="hover:border-gray-400"
                  onClick={() => {
                    setIsOpen(false)
                    setIsDelete(false)
                    setEditingId(null)
                  }}
                >
                  キャンセル
                </Button>
                <Button
                  variant="destructive"
                  className="border-2 border-red-200 hover:border-red-400"
                  onClick={() => { if (editingId !== null) handleDelete(editingId) }}
                >
                  削除
                </Button>
              </div>
            </div>
          ) : (
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
                  className="hover:border-gray-400"
                >
                  キャンセル
                </Button>
                <Button
                variant="outline"
                onClick={handleSave}
                className="border-2 border-blue-200 hover:border-blue-400">保存</Button>
              </div>
            </div>
          )}
        </DialogContent>
      </Dialog>
    </div>
  )
}
