import Header from "../Header/Header";
import Sidebar from "../Sidebar/Sidebar";
import ProjectBar from "../ProjectBar";
import type { ReactNode } from "react";
import { useState } from "react";

type Props = {
  children?: ReactNode;
  onSelectProject: (id: number) => void;
}


export default function Layout({ children, onSelectProject }: Props) {

  return (
    <div className="h-screen">
      <Header
        onSelectProject={(id) => onSelectProject(id)}
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
