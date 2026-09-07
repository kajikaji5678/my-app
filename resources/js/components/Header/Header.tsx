import { createRoot } from "react-dom/client";

type HeaderProps = {};

export default function Header({}: HeaderProps) {
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

        <li className="list-none px-3 py-2">
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
