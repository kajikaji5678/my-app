import React from "react";

function TaskCreatemodal({ onCloseModal }) {
    return (
        <div className="fixed inset-0 flex justify-center items-center z-10 bg-black/60">
            <div className="w-4/5 h-4/5 bg-white z-20 rounded-2xl overflow-hidden relative">
                <div className="absolute top-0 right-6 w-12 h-12 cursor-pointer" onClick={onCloseModal}>
                    <div className="absolute top-1/2 w-8 h-1 bg-white transform rotate-45"></div>
                    <div className="absolute top-1/2 w-8 h-1 bg-white transform -rotate-45"></div>
                </div>
                <div className="w-full h-12 bg-green-400 py-2 px-6 flex items-center">
                    <p className="font-semibold">タスク作成</p>
                </div>
            </div>
        </div>
    );
}

export default TaskCreatemodal;
