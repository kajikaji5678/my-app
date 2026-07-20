
import BoardCard from "../components/BoardCard";
import { useState } from "react";
import TaskCreatemodal from "../components/TaskCreateModal";

export default function BoardRender() {
  const [isOpen, setIsOpen] = useState(false);

  return (
    <>
      <BoardCard onOpenModal={() => setIsOpen(false)} />

      {isOpen && (
        <TaskCreatemodal onCloseModal={() => setIsOpen(false)} />
      )}
    </>
  );
}
