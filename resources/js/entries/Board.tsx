import { createRoot } from "react-dom/client";
import BoardRender from "../pages/boardRender";
import { ProjectPrivider } from "../context/Projectcontext";

const board = document.getElementById("app");

if (board) {
  createRoot(board).render(
    <ProjectPrivider>
      <BoardRender />
    </ProjectPrivider>
  );
}