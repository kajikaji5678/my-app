import { Button } from "@/components/ui/button";
import { Dialog, DialogContent, DialogHeader, DialogTitle } from "@/components/ui/dialog";
import { Input } from "@/components/ui/input";
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from "@/components/ui/table";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
import { useEffect, useState } from "react";

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

  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");

  const handleAdd = async () => {
    const response = await fetch("/api/categories", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-CSRF-TOKEN": csrfToken ?? ""
      },
      body: JSON.stringify({
        name,
      }),
    });

    const data = await response.json();

    if (!response.ok) {
      console.error(data);
      return;
    }

    console.log(data);
  }

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
          <div className="rounded-lg border bg-white">
            <div className="flex items-center justify-between border-b p-4">
              <h2 className="font-semibold">
                {titles[activeType]}
              </h2>

              <Button onClick={() => setIsOpen(true)}>
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
                      <Button variant="outline" size="sm">編集</Button>
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
              <Button onClick={handleAdd}>保存</Button>
            </div>
          </div>
        </DialogContent>
      </Dialog>
    </div>
  )
}
