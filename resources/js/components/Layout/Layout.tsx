import Header from "../Header/Header";
import Sidebar from "../Sidebar/Sidebar";
import ProjectBar from "../ProjectBar";
import type { ReactNode } from "react";

type Props = {
  children?: ReactNode
}

export default function Layout({children}: Props) {
  return (
    <div className="h-screen">
      <Header />
      <div className="flex w-full h-full">
        <Sidebar />
        <main className="h-[calc(100vh-50px)] flex flex-1 flex-col min-w-0 bg-[#F0F0F0]">
          <ProjectBar />
        </main>
      </div>
    </div>
  )
}
