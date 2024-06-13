var btn1 = document.querySelector("#btn1");

btn1.addEventListener("click",function(){
    var main = document.querySelector("#main3")
    var div1 = document.querySelector(".contact-container");
    div1.style.display="none";
    var h1 = document.createElement("h1");
    h1.textContent = "Formulaire soumis avec succès !";
    h1.style.color="green";
    main.appendChild(h1);
    h1.style.textAlign="center";
    var p = document.createElement("p");
    p.textContent = "Merci de nous avoir contactés. Nous vous répondrons dans les plus brefs délais.";
    p.style.textAlign="center";
    main.appendChild(p);

})