document.addEventListener("DOMContentLoaded", () => {
  const dialog = document.querySelector("dialog");
  const form = document.querySelector("#delete");
  if (form !== null) {
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      if (dialog !== null) {
        dialog.showModal();
        const submitting = document.querySelector("#yes");
        const cancel = document.querySelector("#no");
        submitting?.addEventListener("click", () => {
          e.target.submit();
          dialog.close();
        });
        cancel?.addEventListener("click", () => {
          dialog.close();
        });
      }
    });
  }
});
