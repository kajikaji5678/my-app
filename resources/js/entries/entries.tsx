import { createRoot } from "react-dom/client";
import BoardRender from "../pages/boardRender";
import MasterSettings from "../pages/MasterSettings";
import TaskBoard from "../pages/TaskBoard";

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
    <TaskBoard />
  )
}

if (root) {
  createRoot(root).render(
    <MasterSettings />
  )
}
