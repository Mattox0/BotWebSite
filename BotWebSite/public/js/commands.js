if (document.addEventListener) {
    document.addEventListener("click", handleClick, false);
}
else if (document.attachEvent) {
    document.attachEvent("onclick", handleClick);
}

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

        element = element.parentNode;
    }
}

function categorie(button) {
    id = button.id;
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
            allCommands[i].classList.remove('hidden');
        }
    } else {
        for (let i = 0; i < allCommands.length; i++) {
            if (allCommands[i].classList.contains(id)) {
                allCommands[i].classList.remove('hidden');
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