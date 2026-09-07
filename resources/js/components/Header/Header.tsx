import { Popover, PopoverContent, PopoverTrigger } from "@/components/ui/popover";
import { useEffect, useState } from "react";
import { createRoot } from "react-dom/client";

type HeaderProps = {};
export default function Header({ }: HeaderProps) {

  const [hasNotification, setHasNotification] = useState(false);

  const notifications = [
    {
      id: 1,
      message: "田中さんがあなたをメンションしました",
      time: "5分前",
    },
    {
      id: 2,
      message: "鈴木さんがコメントを追加しました",
      time: "20分前",
    },
    {
      id: 3,
      message: "タスクが更新されました",
      time: "1時間前",
    },
  ];

  useEffect(() => {
    const fetchNotification = async () => {
      try {
        const res = await fetch("/api/notification");
        if (!res.ok) throw new Error("失敗");
        const result = await res.json();
        console.log(result);
        setHasNotification(result.data.length > 0);
      } catch (e) {
        console.error(e);
      }
    };
    fetchNotification();
  }, []);

  return (
    <header className="bg-green-50 border-b">
      <ul className="flex gap-2">
        <li className="list-none px-3 py-2">
          <a
            href=""
            className="block px-4 py-2 text-[#333] transition duration-300 hover:bg-emerald-500 hover:text-green-50"
          >
            ダッシュボード
          </a>
        </li>

        <li className="list-none px-3 py-2">
          <a
            href=""
            className="block px-4 py-2 text-[#333] transition duration-300 hover:bg-emerald-500 hover:text-green-50"
          >
            プロジェクト
          </a>
        </li>

        <li className="relative list-none px-3 py-2">
          <Popover>
            <PopoverTrigger asChild>
              <button
                type="button"
                className="block px-4 py-2 text-[#333] transition duration-300 hover:bg-emerald-500 hover:text-green-50"
              >
                お知らせ
                <span className="absolute right-3 top-3 flex h-3 w-3">
                  <span className="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-400 opacity-75" />
                  <span className="relative inline-flex h-full w-full rounded-full bg-red-500" />
                </span>
              </button>
            </PopoverTrigger>
            <PopoverContent className="w-80 bg-white" align="end">
              <div className="border-b px-2 py-2">
                <h3 className="font-semibold">
                  お知らせ
                </h3>
              </div>
              <div className="max-h-80 overflow-y-auto">
                {notifications.map((notification) => (
                  <button
                    key={notification.id}
                    type="button"
                    className="w-full border-b p-2 text-left transition hover:bg-gray-50"
                  >
                    <p className="text-sm">
                      {notification.message}
                    </p>
                    <p className="mt-1 text-xs text-gray-400">
                      {notification.time}
                    </p>
                  </button>
                ))}
              </div>
            </PopoverContent>
          </Popover>
        </li>
      </ul>
    </header>
  );
}

const elemet = document.getElementById("header-root");

if (elemet) {
  createRoot(elemet).render(<Header />)
}
