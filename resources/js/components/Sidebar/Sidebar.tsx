export default function Sidebar() {
  const menus = [
    { image: "/img/home.png", label: "ホーム", href: "/toDo/main", },
    { image: "/img/plus.png", label: "タスク追加", href: "", },
    { image: "/img/note.png", label: "ボード", href: "/toDo/board", },
    { image: "/img/setting.png", label: "設定", href: "/toDo/setting", },
    { image: "/img/address.png", label: "アサイン", href: "/toDo/assign", },
    { image: "/img/admin.png", label: "管理者", href: "/toDo/admin", },
    { image: "/img/graph.png", label: "データ", href: "/toDo/graph", },
  ];

  return (
    <aside className="sidebar">
      <div className="aside_menu_bar_box">
        <div className="aside_menu_bar" />
      </div>
      {menus.map((menu) => (
        <div key={menu.label} className="aside_menu_box">
          <div className="aside_menu_img">
            <img src={menu.image} />
          </div>
          <a href={menu.href}>
            {menu.label}
          </a>
        </div>
      ))}
    </aside>
  )
}
