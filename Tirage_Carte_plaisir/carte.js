const sections = document.querySelectorAll("section");

sections.forEach((section) => {
    const cards = section.firstElementChild;
    // console.log(cards);
    section.addEventListener("click", () => {
        if(cards.classList.contains("selected")){
            cards.classList.remove("selected");
        } else {
             cards.classList.add("selected");
        }
    })
})