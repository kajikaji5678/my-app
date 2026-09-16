import { useEffect, useState } from "react";

type Project = {
  id: number;
  projects_name: string;
}

export default function ProjectBar() {

  const [projects, setProjects] = useState<Project[]>([]);

  useEffect(() => {
    const fetchPoints = async () => {
      const response = await fetch("/api/projects");
      if (!response.ok) throw new Error("プロジェクトの取得に失敗しました");
      const data = await response.json();
      setProjects(data.projects);
    };
    fetchPoints();
  }, [])

  return (
    <div className="projectbar">
      <p className="project_name">
        {projects[0]?.projects_name}
      </p>
      <div className="projectbar_right">
        <div className="user_button">
          <a href="">ユーザー招待</a>
        </div>
      </div>
    </div>
  )
}
