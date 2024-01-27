function toggleSidebar() {
  const sidebar = document.getElementById("sidebar");
  const content = document.querySelector(".content");
  const sidebarIcon = document.getElementById("sidebarIcon");

  if (sidebar.style.left === "0px") {
    sidebar.style.left = "-250px";
    content.style.marginLeft = "0";
    sidebarIcon.className = "fas fa-bars";
  } else {
    sidebar.style.left = "0";
    content.style.marginLeft = "250px";
    sidebarIcon.className = "fas fa-times";
  }
}
