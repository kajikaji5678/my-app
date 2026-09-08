import BoardCard from "../components/BoardCard";
import Layout from "../components/Layout/Layout";
import type { Task } from "../types/task";
import type { Status } from "../types/statuses";
import type { EditedTasks } from "../types/EditedTasks";
import { useEffect, useState } from "react";

type BoardData = {
  tasks: Task[];
  statuses: Status[];
  editedTasks: EditedTasks;
};

export default function TaskBoard() {

  const [boardData, setBoardData] = useState<BoardData | null>(null);

  useEffect(() => {
    fetch(`/api/projects/1/board`)
      .then((res) => res.json())
      .then((data) => {
        setBoardData(data.data);
      });
  }, []);

  if (!boardData) {
    return <div>Loading...</div>;
  }

  return (
    <>
      <Layout>
        <BoardCard
          tasks={boardData.tasks}
          statuses={boardData.statuses}
          editedTasks={boardData.editedTasks}
        />
      </Layout>
    </>
  )
}
