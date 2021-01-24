// DELETE'S MANAGE
// Targets
let buttonDel = document.querySelectorAll('.buttonDel');
let dataId = document.querySelector('input[name=dataId]');
let idDelete = document.getElementById('idDelete');


// Loop for know which is the target and get the data-num
buttonDel.forEach(element => {
    element.addEventListener('click', function () {
        dataId.value = element.dataset.num;
        idDelete.submit();
    });
});


// UPDATE's MANAGE
// Targets
let buttonUpdate = document.querySelectorAll('.buttonUpdate');
let idUpdate = document.getElementById('idUpdate');
let dataIdPut = document.querySelector('input[name=dataIdPut]');
let dataFirstNamePut = document.querySelector('input[name=dataFirstNamePut]');
let dataLastNamePut = document.querySelector('input[name=dataLastNamePut]');
let dataIdVillagePut = document.querySelector('input[name=dataIdVillagePut]');
let dataSkillPut = document.querySelector('input[name=dataSkillPut]');

// Loop for know which is the target and get the data-num
buttonUpdate.forEach(element => {
    element.addEventListener('click', function () {
        // Targets
        let daddy = element.parentElement.parentElement;
        // Get the num of the village (extract URL)
        let temp = daddy.children[3].children[1].innerText;
        dataIdVillagePut.value = /[0-9]+/.exec(temp)[0];
        // Set the datas
        dataIdPut.value = element.dataset.num;
        dataFirstNamePut.value = daddy.children[1].children[1].innerText;
        dataLastNamePut.value = daddy.children[2].children[1].innerText;
        dataSkillPut.value = daddy.children[4].children[1].innerText;
        idUpdate.style.display = 'flex';
    });
});