import { useEffect, useState } from "react";
import { useProject } from "../context/Projectcontext";

type Project = {
  id: number;
  projects_name: string;
}

export default function ProjectBar() {

  const { selectedProjectId } = useProject();
  const [projects, setProjects] = useState<Project[]>([]);

  useEffect(() => {
    const fetchPoints = async () => {
      const response = await fetch("/api/projects");
      if (!response.ok) throw new Error("プロジェクトの取得に失敗しました");
      const data = await response.json();
      setProjects(data.projects);
    };
    fetchPoints();
  }, []);

  const selectedProject = projects.find((project) => project.id === selectedProjectId);

  return (
    <div className="projectbar">
      <p className="project_name">
        {selectedProject?.projects_name}
      </p>
      <div className="projectbar_right">
        <div className="user_button">
          <a href="">ユーザー招待</a>
        </div>
      </div>
    </div>
  )
}
