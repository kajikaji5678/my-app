import BoardCard from "../components/BoardCard";
import { useState } from "react";
import Layout from "../components/Layout/Layout";

export default function BoardRender() {
  const [isOpen, setIsOpen] = useState(false);

  return (
    <>
      <Layout>
        <BoardCard onOpenModal={() => setIsOpen(false)} />
      </Layout>
    </>
  );
}
