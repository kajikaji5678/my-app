import { Textarea } from "@/components/ui/textarea";
import React, { useState } from "react";
import { createComments } from "../../api/TaskComments";
import type { TaskComment } from "resources/js/types/task";
import { Button } from "@/components/ui/button";

type Users = {
  id: number;
  name: string;
}

type Props = {
  taskId: number
  onCommentCreated: (comment: TaskComment) => void;
  users: Users[];
}

export default function TaskCommentTextarea({ taskId, onCommentCreated, users }: Props) {

  const [nowComments, setNowComments] = useState("");
  const [submitError, setSubmitError] = useState<string | null>(null);
  const [mentionOpen, setMentionOpen] = useState(false);

  const handleSubmit = async () => {
    if (!nowComments.trim()) return;
    try {
      const newComment = await createComments(taskId, nowComments);
      onCommentCreated(newComment);
      setNowComments("");
    } catch (e) {
      console.error(e);
      setSubmitError(e instanceof Error ? e.message : "予期せぬエラーが発生しました。");
    }
  }

  const handleCommentChange = (e: React.ChangeEvent<HTMLTextAreaElement>) => {
    const value = e.target.value;
    setNowComments(value);
    const lastword = value.split(/\s/).pop() ?? "";
    setMentionOpen(lastword.startsWith("@"));
  };

  const lastword = nowComments.split(/\s/).pop() ?? "";

  const mentionQuery = lastword.startsWith("@") ? lastword.slice(1).toLowerCase() : "";
  const mentionUsers = users.filter((user) => user.name.toLowerCase().includes(mentionQuery));

  const handleMentionSelect = (user: Users) => {
    const words = nowComments.split(/\s/);
    words[words.length - 1] = `@${user.name}`;
    setNowComments(words.join(" ") + " ");
    setMentionOpen(false);
  }

  return (
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
  )
}
