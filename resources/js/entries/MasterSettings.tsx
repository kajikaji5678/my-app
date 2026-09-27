import { createRoot } from "react-dom/client";
import { ProjectPrivider } from "../context/Projectcontext";
import MasterSettings from "../pages/MasterSettings";

const cms = document.getElementById("cms-root");

if (cms) {
  createRoot(cms).render(
    <ProjectPrivider>
      <MasterSettings/>
    </ProjectPrivider>
  );
}