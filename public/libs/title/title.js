const text = "Web Artys";
const container = document.getElementById("title");

[...text].forEach((char, i) => {
    const span = document.createElement("span");
    span.textContent = char;
    span.classList.add("letter");
    span.style.animationDelay = `${i * 0.1 + 0.8}s`;
    container.appendChild(span);
});

window.addEventListener('load', () => {
  const logo = document.getElementById('animatedImage');
  console.log("Animation lancée");
  // Lancer l'animation avec un léger délai
  setTimeout(() => {
    logo.style.opacity = '1';
    logo.style.transform = 'scale(1)';
  }, 100);
});
