import { useEffect, useState } from "react";
import { createRoot } from "react-dom/client";

type HeaderProps = {};
export default function Header({ }: HeaderProps) {

  const [hasNotification, setHasNotification] = useState(false);

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
          <span className="absolute right-3 top-3 flex h-3 w-3">
            <span className="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-400 opacity-75" />
            <span className="relative inline-flex h-full w-full rounded-full bg-red-500" />
          </span>
          <a
            href=""
            className="block px-4 py-2 text-[#333] transition duration-300 hover:bg-emerald-500 hover:text-green-50"
          >
            お知らせ
          </a>
        </li>
      </ul>
    </header>
  );
}

const elemet = document.getElementById("header-root");

if (elemet) {
  createRoot(elemet).render(<Header />)
}
