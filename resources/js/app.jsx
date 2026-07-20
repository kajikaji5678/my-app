import React from "react";
import ReactDOM from 'react-dom/client';
import { useState } from "react";
import TaskCreateModal from "./components/TaskCreateModal.jsx";
import Board from "./components/BoardCard.jsx";

function App() {
  const [isOpen, setIsOpen] = useState(false);

  return (
    <>
      <Board onOpenModal={() => setIsOpen(true)} />

      {isOpen && (
        <TaskCreateModal onCloseModal={() => setIsOpen(false)} />
      )}
    </>
  );
}

ReactDOM.createRoot(
  document.getElementById('board')
).render(<App />);

// const isOpne = 状態の現在地
// const setIsOpen = 状態変更関数

