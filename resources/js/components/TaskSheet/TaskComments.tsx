import { Card, CardContent } from "@/components/ui/card"
import { ScrollArea } from "@/components/ui/scroll-area"
import type { Comment } from "resources/js/types/task";
import { useState, useEffect } from "react";
import { createComments, getComments } from "../../api/TaskComments";
import { Textarea } from "@/components/ui/textarea";
import { Button } from "@/components/ui/button";

export default function TaskCommnets({ taskId }: { taskId: number }) {

  const [comments, setComments] = useState<Comment[]>([]);
  const [nowComments, setNowComments] = useState("");

  const handleSubmit = async() => {
    if (!nowComments.trim()) return;
    try {
      const newComment = await createComments(taskId, nowComments);
      setComments((prev) => [...prev, newComment]);
      setNowComments("");
    } catch (e) {
      console.error(e);
    }
  }

  useEffect(() => {
    const fetchComments = async () => {
      try {
        const comments = await getComments(taskId);
        setComments(comments);
      } catch (e) {
        console.error(e);
      }
    };

    fetchComments()
  }, [taskId]);
  return (
    <>
      <div className="rounded-xl h-full border-2 border-gray-300 overflow-hidden">
        <div className="px-4 py-3 bg-gray-300 font-bold">
          コメント欄
        </div>
        <ScrollArea className="h-full bg-red-50 p-2">
          <div className="space-y-3">
            {comments.map((comment) => (
              <Card key={comment.id} className="m-2">
                <CardContent className="p-4">
                  <div className="font-semibold text-sm">
                    {comment.user.name}
                  </div>
                  <div className="text-xs text-gray-500">
                    {comment.created_at}
                  </div>
                  <p className="mt-2 text-sm text-gray-700">
                    {comment.body}
                  </p>
                </CardContent>
              </Card>
            ))}
          </div>
          <div className="space-y-2">
            <Textarea
              placeholder="コメントを入力してください"
              value={nowComments}
              onChange={(e) => setNowComments(e.target.value)}
            />
            <div className="flex justify-end">
              <Button
                disabled={!nowComments.trim()}
                variant="secondary"
                className="py-2 px-4 rounded bg-blue-400 text-black cursor-pointer"
              >
                送信
              </Button>
            </div>
          </div>
        </ScrollArea>
      </div>
    </>
  )
}
