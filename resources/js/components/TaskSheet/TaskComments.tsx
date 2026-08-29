import { Card, CardContent } from "@/components/ui/card"
import { ScrollArea } from "@/components/ui/scroll-area"
import type { TaskComment } from "resources/js/types/task";
import { useState, useEffect } from "react";
import { createComments, deleteComment, getComments, updateComment } from "../../api/TaskComments";
import { Textarea } from "@/components/ui/textarea";
import { Button } from "@/components/ui/button";
import type { CurrentUser } from "../../types/user";
import { Dialog, DialogContent, DialogHeader, DialogTitle } from "@/components/ui/dialog";
import { TaskCommentDialog } from "./TaskCommentDialog";

export default function TaskCommnets({ taskId }: { taskId: number }) {

  const [openReplyIds, setOpenReplyIds] = useState<number[]>([]);
  const [comments, setComments] = useState<TaskComment[]>([]);
  const [nowComments, setNowComments] = useState("");
  const [editCommentId, setEditCommentId] = useState<number | null>(null);
  const [editBody, setEditBody] = useState("");
  const [currentUser, setCurrentUser] = useState<CurrentUser | null>(null);
  const [submitError, setSubmitError] = useState<string | null>(null);
  const [editError, setEditError] = useState<{ commentId: number; message: string } | null>(null);
  const [deleteError, setDeleteError] = useState<{ commentId: number; message: string } | null>(null);
  const [isDeleteOpen, setIsDeleteOpen] = useState(false);
  const [deleteCommentId, setDeleteCommentId] = useState<number | null>(null);

  const dummyReplies = [
    {
      id: 101,
      user: {
        name: "田中"
      },
      created_at: "2029",
      body: "これは返信コメントです"
    },
    {
      id: 101,
      user: {
        name: "大和田"
      },
      created_at: "2029",
      body: "これも返信コメントです"
    }
  ]

  useEffect(() => {
    const fetchUser = async () => {
      try {
        const response = await fetch("/api/user", {
          headers: {
            Accept: "application/json"
          }
        });
        if (!response.ok) throw new Error("ユーザー情報の取得失敗");
        const user = await response.json();
        setCurrentUser(user);
      } catch (e) {
        console.error(e);
      }
    }

    fetchUser();
  }, []);

  const handleSubmit = async () => {
    if (!nowComments.trim()) return;
    try {
      const newComment = await createComments(taskId, nowComments);
      console.log(newComment);
      setComments((prev) => [...prev, newComment]);
      setNowComments("");
    } catch (e) {
      console.error(e);
      setSubmitError(e instanceof Error ? e.message : "予期せぬエラーが発生しました。");
    }
  }

  const handleEdit = async () => {
    if (!editBody.trim() || editCommentId === null) return;
    try {
      const updatedComment = await updateComment(editCommentId, editBody);
      setComments((prev) => prev.map((content) => content.id === updatedComment.id ? updatedComment : content));
      setEditCommentId(null);
      setEditBody("");
    } catch (e) {
      console.error(e);
      setEditError({ commentId: editCommentId, message: e instanceof Error ? e.message : "予期せぬエラーが発生しました。" });
    }
  }

  const handleDelete = async (commentId: number) => {
    try {
      await deleteComment(commentId);
      setComments((prev) => prev.filter((comment) => comment.id !== commentId));
    } catch (e) {
      console.error(e);
      setDeleteError({ commentId, message: e instanceof Error ? e.message : "予期せぬエラーが発生しました。" });
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
      <div className="flex flex-col rounded-xl h-full border-2 border-gray-300 overflow-hidden">
        <div className="px-4 py-3 bg-gray-300 font-bold">
          コメント欄
        </div>
        <ScrollArea className="min-h-0 flex-1 bg-red-50 p-2">
          <div className="space-y-3">
            {comments.map((comment) => {
              const canEdit = currentUser !== null && (currentUser.admin === 1 || currentUser.id === comment.user.id);
              const isRepliesOpen = openReplyIds.includes(comment.id);
              const toggleReplies = (commentId: number) => {
                setOpenReplyIds((prev) => prev.includes(commentId) ? prev.filter((id) => id !== commentId) : [...prev, commentId]);
              }
              return (
                <>
                  <Card key={comment.id} className="m-2">
                    {editCommentId === comment.id ? (
                      <div className="space-y-2 shrink-0">
                        <Textarea
                          value={editBody}
                          onChange={(e) => setEditBody(e.target.value)}
                        />
                        <div className="flex justify-end">
                          <Button
                            disabled={!editBody.trim()}
                            className="py-2 px-4 rounded bg-blue-400 text-black cursor-pointer"
                            onClick={handleEdit}
                          >
                            保存
                          </Button>
                          <Button
                            className="py-2 px-4 rounded bg-gray-200 text-black cursor-pointer"
                            onClick={() => { setEditCommentId(null); setEditBody("") }}
                          >
                            キャンセル
                          </Button>
                        </div>
                      </div>
                    ) : (
                      <CardContent className="p-3">
                        <div className="flex justify-between">
                          <p className="font-semibold text-sm">{comment.user.name}</p>
                          {canEdit &&
                            <div className="flex">
                              <div
                                className="text-xs mr-2 text-blue-600 cursor-pointer"
                                onClick={() => { setEditCommentId(comment.id); setEditBody(comment.body) }}>
                                編集
                              </div>
                              <div
                                className="text-xs text-red-600 cursor-pointer"
                                onClick={() => { setIsDeleteOpen(true); setDeleteCommentId(comment.id) }}>
                                削除
                              </div>
                            </div>}
                        </div>
                        <p className="text-xs text-gray-500">
                          {comment.created_at}
                        </p>
                        <p className="mt-1 text-sm text-gray-700">
                          {comment.body}
                        </p>
                        {editError?.commentId === comment.id && <p className="text-sm text-red-500">{editError.message}</p>}
                        {deleteError?.commentId === comment.id && <p className="text-sm text-red-500">{deleteError.message}</p>}

                        {/* 返信開閉 */}
                        <Button
                          variant="ghost"
                          className="mt-3 px-0 text-xs text-blue-600"
                          onClick={() => toggleReplies(comment.id)}>
                          {isRepliesOpen ? "返信を閉じる" : "返信を見る"}
                        </Button>
                      </CardContent>
                    )}
                  </Card>

                  {isRepliesOpen && (
                    <div className="ml-3">
                      {dummyReplies.map((reply) => (
                        <Card key={reply.id} className="m-2">
                          <CardContent className="p-3">
                            <div className="flex justify-between">
                              <p className="font-semibold text-sm">
                                {reply.user.name}
                              </p>
                              {canEdit &&
                                <div className="flex">
                                  <div
                                    className="text-xs mr-2 text-blue-600 cursor-pointer"
                                    onClick={() => { setEditCommentId(reply.id); setEditBody(reply.body) }}>
                                    編集
                                  </div>
                                  <div
                                    className="text-xs text-red-600 cursor-pointer"
                                    onClick={() => { setIsDeleteOpen(true); setDeleteCommentId(reply.id) }}>
                                    削除
                                  </div>
                                </div>}
                            </div>
                            <p className="text-xs text-gray-500">
                              {reply.created_at}
                            </p>
                            <p className="mt-1 text-sm text-gray-700">
                              {reply.body}
                            </p>
                            {editError?.commentId === comment.id && <p className="text-sm text-red-500">{editError.message}</p>}
                            {deleteError?.commentId === comment.id && <p className="text-sm text-red-500">{deleteError.message}</p>}
                          </CardContent>
                        </Card>
                      ))}
                    </div>
                  )}
                </>
              )
            })}
          </div>
        </ScrollArea>
        <div className="space-y-2 shrink-0 border-t bg-white p-3">
          <Textarea
            placeholder="コメントを入力してください"
            value={nowComments}
            onChange={(e) => setNowComments(e.target.value)}
          />
          <div className="flex justify-end">
            <Button
              disabled={!nowComments.trim()}
              className="py-2 px-4 rounded bg-blue-400 text-black cursor-pointer"
              onClick={handleSubmit}
            >
              送信
            </Button>
            {submitError && <p className="text-sm text-red-500">{submitError}</p>}
          </div>
        </div>

        <TaskCommentDialog
          isDeleteOpen={isDeleteOpen}
          setIsDeleteOpen={setIsDeleteOpen}
          deleteCommentId={deleteCommentId}
          setDeleteCommentId={setDeleteCommentId}
          handleDelete={handleDelete}
        />

      </div>
    </>
  )
}
