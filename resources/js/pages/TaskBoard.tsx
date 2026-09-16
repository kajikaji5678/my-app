import BoardCard from "../components/BoardCard";
import Layout from "../components/Layout/Layout";
import type { Task } from "../types/task";
import type { Status } from "../types/statuses";
import type { EditedTasks } from "../types/EditedTasks";
import { useEffect, useState } from "react";
import type { Categories } from "../types/categories";
import { ProjectPrivider, useProject } from "../context/Projectcontext";

type BoardData = {
  tasks: Task[];
  statuses: Status[];
  categories: Categories[];
  editedTasks: EditedTasks;
};
export default function TaskBoard() {

  const [boardData, setBoardData] = useState<BoardData | null>(null);

  useEffect(() => {
    fetch(`/api/projects/1/board`)
      .then((res) => {
        return res.json()
      })
      .then((data) => {
        setBoardData(data.data);
      });
  }, []);

  if (!boardData) {
    return <div>Loading...</div>;
  }

  return (
    <>
      <ProjectPrivider>
        <Layout>
          <BoardCard />
        </Layout>
      </ProjectPrivider>
    </>
  )
}
