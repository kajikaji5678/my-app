import Header from "../Header/Header";
import Sidebar from "../Sidebar/Sidebar";
import ProjectBar from "../ProjectBar";
import type { ReactNode } from "react";
import { useState } from "react";
import { useProject } from "../../context/Projectcontext";

type Props = {
  children?: ReactNode;
}

export default function Layout({ children }: Props) {

  const { selectedProjectId } = useProject();

  console.log(selectedProjectId);

  return (
    <div className="h-screen">
      <Header
      />
      <div className="flex w-full h-full">
        <Sidebar />
        <main className="h-[calc(100vh-50px)] flex flex-1 flex-col min-w-0 bg-[#F0F0F0]">
          <ProjectBar />
          {children}
        </main>
      </div>
    </div>
  )
}
