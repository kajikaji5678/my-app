export default function ProjectBar() {
  const project = {
    id: 1,
    projects_name: "仮データ"
  };

  return (
    <div className="projectbar">
      <p className="project_name">
        {project.projects_name}
      </p>
      <div className="projectbar_right">
        <div className="user_button">
          <a href="">ユーザー招待</a>
        </div>
      </div>
    </div>
  )
}
