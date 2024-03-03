// EDIT PROFIL
let form_delete_profil = document.querySelector('.deleteAccount__form')
let change_avatar_profil = document.querySelector('.changeAvatar__form')

function verif_password(){
    if (form_delete_profil.style.display === 'none'){
        form_delete_profil.style.display = 'block'
    }else{
        form_delete_profil.style.display = 'none'
    }
}

function change_avatar(){
    if (change_avatar_profil.style.display === 'none'){
        change_avatar_profil.style.display = 'block'
    }else{
        change_avatar_profil.style.display = 'none'
    }
}

document.querySelector('.burger-button').addEventListener('click', function(){
    document.querySelector('.burger-menu').classList.toggle('burger-appear');
});


document.querySelector('.rankingLinks').addEventListener('click', function(){
    console.log('test')
    let ranking = document.querySelector('.ranking');
    ranking.classList.toggle('appearRanking');
});
