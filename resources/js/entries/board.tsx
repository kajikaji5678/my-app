import { createRoot } from "react-dom/client";
import BoardRender from "../pages/boardRender";

const container = document.getElementById("board");

if (container) {
  createRoot(container).render(
    <BoardRender />
  );
}
