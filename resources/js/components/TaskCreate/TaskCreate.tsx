import { Button } from "@/components/ui/button";
import { Dialog, DialogContent, DialogDescription, DialogHeader, DialogTitle } from "@/components/ui/dialog";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { TextAnimate } from "@/components/ui/text-animate";


type Props = {
  open: boolean;
  onOpenChange: (open: boolean) => void;
}

export default function TaskCreateModal({ open, onOpenChange }: Props) {
  return (
    <Dialog
      open={open}
      onOpenChange={onOpenChange}
    >
      <DialogContent
        className="h-4/5 px-8 py-6 min-w-[80vw] bg-white data-[state=open]:[animation-duration:500ms] data-[state=closed]:[animation-duration:300ms]"
      >
        <DialogHeader>
          <TextAnimate
            animation="slideUp"
            by="character"
            className="text-lg text-black"
            delay={0.5}
          >
            タスクを作成する
          </TextAnimate>
          <DialogDescription className="text-sm mb-2 font-semibold text-gray-500">
            新しいタスクの情報を入力してください。
          </DialogDescription>
          <div className="space-y-5">
            <div className="space-y-2">
              <Label htmlFor="task_name">タスク名</Label>
              <Input id="task_name" placeholder="タスク名を入力" />
            </div>
            <div className="grid grid-cols-2 gap-4">
              <div className="space-y-2">
                <Label>カテゴリ</Label>
              </div>
              <div className="space-y-2">
                <Label>タイプ</Label>
              </div>
            </div>
            <div className="grid grid-cols-2 gap-4">
              <div className="space-y-2">
                <Label>ステータス</Label>
              </div>
              <div className="space-y-2">
                <Label>優先度</Label>
              </div>
            </div>
          </div>
          <div className="grid grid-cols-2 gap-4">
            <div className="space-y-2">
              <Label>担当者</Label>
              <Input />
            </div>
            <div className="space-y-2">
              <Label>期限</Label>
              <Input type="data" />
            </div>
          </div>
          <div className="space-y-2">
            <Label>見積もり時間</Label>
            <Input
              id="estimated_time"
              type="number"
              min={0}
              placeholder="分"
            />
          </div>
          <div className="space-y-2">
            <Label htmlFor="schedule">スケジュール</Label>
            <Input
              id="schedule"
              placeholder="スケジュールを入力"
            />
          </div>
          <div className="flex justify-end gap-2 pt-2">
            <Button
              type="button"
              variant="outline"
              onClick={() => onOpenChange(false)}>
              キャンセル
            </Button>
            <Button
              type="button"
              variant="outline"
              className="border-2 border-blue-200 hover:border-blue-400"
            >
              タスクを追加
            </Button>
          </div>
        </DialogHeader>
      </DialogContent>
    </Dialog>
  )
}
