import type { Task } from "../types/task";

type Props = {
  open: boolean;
  task: Task | null;
  onClose: () => void;
};

export default function TaskSheet({
  open,
  task,
  onClose
}: Props) {
  return (
    <>
      {open && (
        <div
          className="fixed inset-0 bg-black/40 z-40"
          onClick={onClose}>
          <div
            className="w-[500px] h-full bg-white p-6"
            onClick={(e) => e.stopPropagation()}
          >
            <button onClick={onClose}>×</button>
            <h1>Task Sheet</h1>
          </div>
        </div>
      )}
    </>
  )
}
