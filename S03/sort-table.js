const sortButtons = [
  { dataOrder: "asc", src: "../img/asc.svg", alt: "asc-image" },
  { dataOrder: "desc", src: "../img/desc.svg", alt: "desc-image" },
  { dataOrder: "both", src: "../img/both.svg", alt: "both-image" }
];

const createSortButtons = (columnKey,th) => {
    const sortButtonsBox = createAttributedElements ({
        tag:"div",
        valuesByAttributes:{
            id:`js-${columnKey}Buttons-Box`,
            class: "w-10 inline-block align-middle"
        }
    })

    const fragment = document.createDocumentFragment();

    for(const button of sortButtons){
        const sortButton = createAttributedElements({
            tag:"button",
            valuesByAttributes:{
                class: `js-${columnKey}SortButton`,
                'data-order':button.dataOrder
            }
        });

        button.dataOrder != "both" && sortButton.classList.add("hidden");

        const sortButtonImage = createAttributedElements({
            tag:"img",
            valuesByAttributes:{
                class:"pointer-events-none",
                src:button.src,
                alt:button.alt
            }
        })

        fragment.appendChild(sortButton).appendChild(sortButtonImage);
    }
}