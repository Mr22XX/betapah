const modal = () =>{
    let judul = document.querySelector(".judulReal").textContent;
    let modalJudul = document.querySelector(".judul")
    let modalDesk = document.querySelector(".desk");
    let desk = document.querySelector(".deskReal");
    let location = document.querySelector(".locReal").innerText;
    let modalLocation = document.querySelector(".loc");
    
    
    console.log(modalJudul.innerText = judul);
    desk.style.display = 'block';
    let showDesc = desk.textContent;
    console.log(modalDesk.innerHTML = showDesc);
    desk.style.display = 'none';

    console.log(modalLocation.innerHTML = location);
}