import React from "react";
import ReactDOM from 'react-dom/client';
import { useState } from "react";
import TaskCreateModal from "./components/TaskCreateModal.js";
import Board from "./components/Board.js";

function App() {
    const [isOpen, setIsOpen] = useState(false);

    return (
        <>
            <Board onOpenModal={() => setIsOpen(true)} />

            {isOpen && (
                <TaskCreateModal onClose={() => setIsOpen(false)} />
            )}
        </>
    );
}

ReactDOM.createRoot(
    document.getElementById('react-root')!
).render(<App />);