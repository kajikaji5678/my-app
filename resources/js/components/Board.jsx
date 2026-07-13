import React from "react";
import BoardBoxContent from "./BoardBoxContent.jsx";

function Board({ onOpenModal }) {
    const root = document.getElementById('react-root');
    const statuses = JSON.parse(root.dataset.statuses);
    const tasks = JSON.parse(root.dataset.tasks);

    const normalTasks = [];
    const warningTasks = [];
    const superWarningTasks = [];

    tasks.forEach(task => {
        const overTime = task.real_time - task.estimated_time;

        if (overTime >= 60 && Number(task.status_id) === 2) {
            superWarningTasks.push(task);
        } else if (overTime >= 30) {
            warningTasks.push(task);
        } else {
            normalTasks.push(task);
        }
    });

    return (
        <div className="p-6 flex gap-4">
            {statuses.map(status => {
                const statusNormalTasks = normalTasks.filter(
                    task => Number(task.status_id) === Number(status.id)
                );

                const statusWarningTasks = warningTasks.filter(
                    task => Number(task.status_id) === Number(status.id)
                );

                const statusSuperWarningTasks = superWarningTasks.filter(
                    task => Number(task.status_id) === Number(status.id)
                );

                return (
                    <div key={status.id} className="py-3 px-4 h-auto w-80 bg-white rounded-lg gap-3 overflow-y-auto">
                        <div className="flex items-center justify-between">
                            <div className="flex">
                                <p className="text-[15px] font-bold flex items-center gap-2">
                                    <span className="inline-block w-4 h-4 rounded-full" style={{ backgroundColor: status.status_color }}></span>
                                    {status.status_name}
                                </p>
                                <p className="bg-[#D9D9D9] py-1 px-4 rounded-2xl text-xs font-semibold ml-3">
                                    {statusNormalTasks.length + statusWarningTasks.length + statusSuperWarningTasks.length}
                                </p>
                            </div>
                            <button onClick={onOpenModal} className="mt-1 w-6 h-6 cursor-pointer">+</button>
                        </div>

                        <BoardBoxContent
                            normalTasks={statusNormalTasks}
                            warningTasks={statusWarningTasks}
                            superWarningTasks={statusSuperWarningTasks}
                        />
                    </div>
                );
            })}
        </div>
    );
}

export default Board;
