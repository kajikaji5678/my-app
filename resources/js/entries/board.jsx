import { createRoot } from "react-dom/client";
import BoardRender from "../pages/boardRender";

createRoot(
    document.getElementById("board")
).render(
    <BoardRender />
);
