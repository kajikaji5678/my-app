import React, { createContext, useContext, useState } from "react";

type ProjectContextType = {
  selectedProjectId: number;
  setSelectedProjectId: (id: number) => void;
}

const ProjectContext = createContext<ProjectContextType | null>(null);

export function ProjectPrivider({children}: {children: React.ReactNode}) {
  const [selectedProjectId, setSelectedProjectId] = useState(1);

  return (
    <ProjectContext.Provider
      value={{selectedProjectId,setSelectedProjectId}}
    >
      {children}
    </ProjectContext.Provider>
  );
}

export function useProject() {
  const context = useContext(ProjectContext);
  if (!context) throw new Error ("Context Error!!!");
  return context;
}
