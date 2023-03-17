function logout() {
    localStorage.removeItem("sessionToken");
    window.location.replace("index.html");
  }