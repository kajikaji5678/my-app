import { Dialog, DialogContent, DialogHeader, DialogTitle } from "@/components/ui/dialog";
import { Button } from "@/components/ui/button";

type Props = {
  isDeleteOpen: boolean;
  setIsDeleteOpen: (open: boolean) => void;
  deleteCommentId: number | null;
  setDeleteCommentId: (id: number | null) => void;
  handleDelete: (commentId: number) => void;
}

export function TaskCommentDialog({
  isDeleteOpen,
  setIsDeleteOpen,
  deleteCommentId,
  setDeleteCommentId,
  handleDelete
}: Props) {
  return (
    <Dialog open={isDeleteOpen} onOpenChange={setIsDeleteOpen}>
      <DialogContent className="border-2 border-red-400 bg-white">
        <DialogHeader>
          <DialogTitle>
            コメントの削除
          </DialogTitle>
        </DialogHeader>
        <div className="space-y-4">
          <p>コメントを削除してもよろしいでしょうか？</p>
          <div className="flex justify-end gap-2">
            <Button
              variant="outline"
              className="hover:border-gray-400"
              onClick={() => {
                setIsDeleteOpen(false);
                setDeleteCommentId(null);
              }}
            >
              キャンセル
            </Button>
            <Button
              variant="destructive"
              className="border-2 border-red-200 hover:border-red-400"
              onClick={() => { if (deleteCommentId !== null) handleDelete(deleteCommentId); setIsDeleteOpen(false); setDeleteCommentId(null) }}
            >
              削除
            </Button>
          </div>
        </div>
      </DialogContent>
    </Dialog>
  )
}
