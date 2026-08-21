import { createRoot } from "react-dom/client";
import BoardRender from "../pages/boardRender";
import MasterSettings from "../pages/MasterSettings";

const container = document.getElementById("board");
const root = document.getElementById("cms-root");

if (container) {
  createRoot(container).render(
    <BoardRender />
  );
}

if (root) {
  createRoot(root).render(
    <MasterSettings />
  )
}
