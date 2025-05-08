const text = "Web Artys";
const container = document.getElementById("title");

[...text].forEach((char, i) => {
    const span = document.createElement("span");
    span.textContent = char;
    span.classList.add("letter");
    span.style.animationDelay = `${i * 0.1 + 0.8}s`;
    container.appendChild(span);
});
