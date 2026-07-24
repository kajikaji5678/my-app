
import BoardCard from "../components/BoardCard";
import { useState } from "react";

export default function BoardRender() {
  const [isOpen, setIsOpen] = useState(false);

  return (
    <>
      <BoardCard onOpenModal={() => setIsOpen(false)} />
    </>
  );
}
