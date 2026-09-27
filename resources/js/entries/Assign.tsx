import { createRoot } from "react-dom/client";
import { ProjectPrivider } from "../context/Projectcontext";
import Assign from "../pages/Assign";

const assign = document.getElementById("assign");

if (assign) {
  createRoot(assign).render(
    <ProjectPrivider>
      <Assign/>
    </ProjectPrivider>
  )
}
