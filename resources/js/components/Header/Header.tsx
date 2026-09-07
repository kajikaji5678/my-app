import { Popover, PopoverContent, PopoverTrigger } from "@/components/ui/popover";
import { useEffect, useState } from "react";
import { createRoot } from "react-dom/client";

type HeaderProps = {};
type Notification = {
  id: string;
  message: string;
  readAt: string | null;
  createdAt: string;
};
export default function Header({ }: HeaderProps) {

  const [hasNotification, setHasNotification] = useState(false);
  const [notifications, setNotifications] = useState<Notification[]>([]);

  useEffect(() => {
    const fetchNotification = async () => {
      try {
        const res = await fetch("/api/notification");
        if (!res.ok) throw new Error("失敗");
        const result = await res.json();
        console.log(result);
        setHasNotification(result.length > 0);
        setNotifications(result);
      } catch (e) {
        console.error(e);
      }
    };
    fetchNotification();
  }, []);

  const readNotification = async (id: string) => {
    try {
      const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");
      const res = await fetch(`/api/notifications/${id}/read`, {
        method: "PUT",
        headers: {
          "X-CSRF-TOKEN": token ?? "",
          Accept: "application/json",
        },
      });
      if (!res.ok) throw new Error("通知の既読処理に失敗しました");
      setNotifications((prev) => prev.filter((notification) => notification.id !== id));
    } catch (e) {
      console.error(e);
    }
  }

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
                {hasNotification && (
                  <span className="absolute right-3 top-3 flex h-3 w-3">
                    <span className="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-400 opacity-75" />
                    <span className="relative inline-flex h-full w-full rounded-full bg-red-500" />
                  </span>
                )}
              </button>
            </PopoverTrigger>
            <PopoverContent className="w-80 bg-white" align="end">
              <div className="border-b px-2 py-2">
                <h3 className="font-semibold">
                  お知らせ
                </h3>
              </div>
              <div className="max-h-80 overflow-y-auto">
                {notifications.length === 0 ? (
                  <p className="text-sm text-gray-500">
                    お知らせはありません
                  </p>
                ) : (
                  notifications.map((notification) => (
                    <button
                      key={notification.id}
                      type="button"
                      onClick={() => {readNotification(notification.id); setHasNotification(false)}}
                      className="w-full border-b p-2 text-left transition hover:bg-gray-100"
                    >
                      <p className="text-sm">
                        {notification.message}
                      </p>
                    </button>
                  ))
                )}
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
