/******/ (() => { // webpackBootstrap
/*!***********************************!*\
  !*** ./resources/js/home/memo.js ***!
  \***********************************/
document.addEventListener("DOMContentLoaded", function () {
  var textarea = document.getElementById("memo");
  var status = document.getElementById("memo-status");
  if (!textarea || !status) return;
  var timeoutId;
  textarea.addEventListener("input", function () {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(function () {
      var _document$querySelect;
      var csrfToken = (_document$querySelect = document.querySelector('meta[name="csrf-token"]')) === null || _document$querySelect === void 0 ? void 0 : _document$querySelect.getAttribute("content");
      if (!csrfToken) {
        console.warn("CSRFトークンが見つかりませんでした。");
        return;
      }
      var formData = new FormData();
      formData.append("memo", textarea.value);
      fetch("/memo/auto-save", {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": csrfToken
        },
        body: formData
      }).then(function (response) {
        if (!response.ok) throw new Error("保存に失敗しました");
        return response.json();
      }).then(function () {
        status.textContent = "保存しました";
        status.classList.remove("error");
        status.classList.add("success");
        setTimeout(function () {
          return status.textContent = "";
        }, 2000);
      })["catch"](function (err) {
        console.error(err);
        status.textContent = "保存に失敗しました";
        status.classList.remove("success");
        status.classList.add("error");
      });
    }, 800); // 入力停止後800msで保存
  });
});
/******/ })()
;