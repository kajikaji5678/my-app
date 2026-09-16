import BoardCard from "../components/BoardCard";
import Layout from "../components/Layout/Layout";
import type { Task } from "../types/task";
import type { Status } from "../types/statuses";
import type { EditedTasks } from "../types/EditedTasks";
import { useEffect, useState } from "react";
import type { Categories } from "../types/categories";
import { ProjectPrivider } from "../context/ProjectContext";

type BoardData = {
  tasks: Task[];
  statuses: Status[];
  categories: Categories[];
  editedTasks: EditedTasks;
};
export default function TaskBoard() {

  const [boardData, setBoardData] = useState<BoardData | null>(null);
  const [selectedProjects, setSelectedProjects] = useState(1);

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
          <BoardCard
            tasks={boardData.tasks}
            statuses={boardData.statuses}
            editedTasks={boardData.editedTasks}
            categories={boardData.categories}
          />
        </Layout>
      </ProjectPrivider>
    </>
  )
}
