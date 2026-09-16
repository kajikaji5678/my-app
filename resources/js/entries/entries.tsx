import { createRoot } from "react-dom/client";
import BoardRender from "../pages/boardRender";
import MasterSettings from "../pages/MasterSettings";
import TaskBoard from "../pages/TaskBoard";
import Layout from "../components/Layout/Layout";
import { ProjectPrivider } from "../context/Projectcontext";

const container = document.getElementById("board");
const root = document.getElementById("cms-root");
const element = document.getElementById("app");

if (container) {
  createRoot(container).render(
    <BoardRender />
  );
}

if (element) {
  createRoot(element).render(
    <ProjectPrivider>
      <TaskBoard />
    </ProjectPrivider>
  )
}

if (root) {
  createRoot(root).render(
    <ProjectPrivider>
      <MasterSettings />
    </ProjectPrivider>
  )
}
