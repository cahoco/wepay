document.addEventListener("DOMContentLoaded", function () {
    const memo = document.getElementById("memo");
    const status = document.getElementById("memo-status");

    let timeout;

    memo.addEventListener("input", function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            saveMemo(memo.value);
        }, 1000); // 1秒後に保存
    });

    function saveMemo(content) {
        fetch("/memo/update", {
            method: "POST",
            credentials: "same-origin",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify({ content }),
        })
            .then((res) => res.json())
            .then((data) => {
                status.textContent = "✔ 自動保存しました";
                setTimeout(() => (status.textContent = ""), 1500);
            })
            .catch((err) => {
                console.error(err);
                status.textContent = "⚠ 保存に失敗しました";
            });
    }
});
