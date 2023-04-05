export function create_Close_button(source)
{
    const closeButton = document.createElement("button");
    closeButton.innerHTML = "X";
    closeButton.classList.add("close-button");
    closeButton.addEventListener("click", () => {
      source.parentNode.removeChild(source);
    });
    source.classList.add("closable-div");
    source.appendChild(closeButton);
}
