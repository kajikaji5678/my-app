import { useState } from "react";

type row = {
  label: string;
  value: string | undefined;
};

type Props = {
  rows: row[];
}

export default function TaskLabel({ rows }: Props) {

  const [edit, setEdit] = useState(false);

  return (
    <>
      <div className="w-full flex items-center justify-between px-4 py-3 border-b bg-gray-200">
        <h2 className="font-semibold">詳細</h2>
        <button
          className="text-blue-600 text-sm hover:underline cursor-pointer"
          onClick={() => setEdit(!edit)}>
          {edit ? "キャンセル" : "編集"}
        </button>
      </div>
      <div className="grid grid-cols-[120px_1fr]">
        {rows.map((row: row) => (
          <>
            <p className="text-gray-600 px-4 py-3">
              {row.label}
            </p>
            <p className="font-semibold px-4 py-3">
              {edit ? (
                <input
                value={row.value}
                className="w-full border rounded px-2 py-1"/>
              ) : (
                <p className="font-semibold">
                  {row.value}
                </p>
              )}
            </p>
          </>
        ))}
      </div>
    </>
  )
}
