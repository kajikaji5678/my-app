type row = {
  label: string;
  value: string | undefined;
};

type Props = {
  rows: row[];
}

export default function TaskLabel({rows} : Props) {
  return (
    <>
      <div className="w-full flex items-center justify-between px-4 py-3 border-b bg-gray-200">
        <h2 className="font-semibold">詳細</h2>
        <button className="text-blue-600 text-sm hover:underline cursor-pointer">編集</button>
      </div>
      <div className="grid grid-cols-[120px_1fr]">
        {rows.map((row: row) => (
          <>
            <p className="text-gray-600 px-4 py-3">
              {row.label}
            </p>
            <p className="font-semibold px-4 py-3">
              {row.value}
            </p>
          </>
        ))}
      </div>
    </>
  )
}
