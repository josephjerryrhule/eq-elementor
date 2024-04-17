document.addEventListener("DOMContentLoaded", () => {
  const eqnextNav = document.querySelector(".eq-next-nav");
  const eqprevNav = document.querySelector(".eq-prev-nav");
  const galleryItems = document.querySelectorAll(".eq-ciel-gallery-item");

  eqnextNav.addEventListener("click", () => {
    const current = document.querySelector(".eq-ciel-gallery-item.opacity-100");
    let currentIndex;
    galleryItems.forEach((item, index) => {
      if (item === current) {
        currentIndex = index;
      }
    });
    let nextIndex = (currentIndex + 1) % galleryItems.length;
    const next = galleryItems[nextIndex];
    current.classList.remove("opacity-100");
    current.classList.add("opacity-0");
    next.classList.remove("opacity-0");
    next.classList.add("opacity-100");
  });

  eqprevNav.addEventListener("click", () => {
    const current = document.querySelector(".eq-ciel-gallery-item.opacity-100");
    let currentIndex;
    galleryItems.forEach((item, index) => {
      if (item === current) {
        currentIndex = index;
      }
    });
    let prevIndex =
      (currentIndex - 1 + galleryItems.length) % galleryItems.length;
    const prev = galleryItems[prevIndex];
    current.classList.remove("opacity-100");
    current.classList.add("opacity-0");
    prev.classList.remove("opacity-0");
    prev.classList.add("opacity-100");
  });
});
