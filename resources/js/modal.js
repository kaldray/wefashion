document.addEventListener("DOMContentLoaded", () => {
  const dialog = document.querySelector("dialog");
  const form = document.querySelectorAll(".delete");
  if (form !== null) {
    console.log("form");
    form.forEach((node) => {
      node.addEventListener("submit", (e) => {
        console.log("form2222");
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
    });
  }
});
