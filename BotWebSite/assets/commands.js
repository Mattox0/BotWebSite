if (document.addEventListener) {
    document.addEventListener("click", handleClick, false);
}
else if (document.attachEvent) {
    document.attachEvent("onclick", handleClick);
}

let currentPage = 0;

function handleClick(event) {
    event = event || window.event;
    event.target = event.target || event.srcElement;

    let element = event.target;

    // Climb up the document tree from the target of the event
    while (element) {
        if (element.nodeName === "BUTTON" && /categorie/.test(element.className)) {
            // The user clicked on a <button> or clicked on an element inside a <button>
            // with a class name called "foo"
            categorie(element);
            break;
        }
        if (element.nodeName === "DIV" && /command/.test(element.className)) {
            showInfos(element);
            break;
        }

        if (element.nodeName === "BUTTON" && /pagination/.test(element.className)) {
            pagination(element);
        }
        element = element.parentNode;
    }
}

function categorie(button) {
    id = button.id;
    count = 0;
    allCategories = document.getElementsByClassName('categorie');
    for (let i = 0; i < allCategories.length; i++) {
        if (id === allCategories[i].id) {
            allCategories[i].classList.add('selected');
        } else {
            allCategories[i].classList.remove('selected');
        }
    }
    allCommands = document.getElementsByClassName('command');
    if (id === 'all') {
        for (let i = 0; i < allCommands.length; i++) {
            if (count >= 10) {
                allCommands[i].classList.add('hidden');
                continue;
            }
            allCommands[i].classList.remove('hidden');
            count++
        }
    } else {
        for (let i = 0; i < allCommands.length; i++) {
            if (allCommands[i].classList.contains(id)) {
                if (count >= 10) {
                    allCommands[i].classList.add('hidden');
                    continue
                }
                allCommands[i].classList.remove('hidden');
                count++;
            } else {
                allCommands[i].classList.add('hidden');
            }
        }
    }
}

function showInfos(command) {
    allInfos = document.getElementsByClassName('infos');
    for (let i = 0; i < allInfos.length; i++) {
        allInfos[i].firstElementChild.classList.add('hidden');
    }
    command.lastElementChild.firstElementChild.classList.remove('hidden');
}

function pagination(button) {
    selected = document.querySelector('.selected').id;
    if (selected === 'all') {
        allCommandsView = document.getElementsByClassName('command');
    } else {
        allCommandsView = document.querySelectorAll(`div.command.${selected}`);
    }
    if (button.id === 'next') {
        if (currentPage+1 < Math.ceil(allCommandsView.length / 10)) {
            currentPage++;
            for (let i = 0; i < allCommandsView.length; i++) {
                if (i >= currentPage * 10 && i < (currentPage + 1) * 10) {
                    allCommandsView[i].classList.remove('hidden');
                } else {
                    allCommandsView[i].classList.add('hidden');
                }
            }
        }
    }
    if (button.id === 'prev') {
        if (currentPage > 0) {
            currentPage--;
            for (let i = 0; i < allCommandsView.length; i++) {
                if (i >= currentPage * 10 && i < (currentPage + 1) * 10) {
                    allCommandsView[i].classList.remove('hidden');
                } else {
                    allCommandsView[i].classList.add('hidden');
                };
            };
        };
    }
}
