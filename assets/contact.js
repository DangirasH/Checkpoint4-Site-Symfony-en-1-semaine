const labels = document.getElementsByClassName("col-form-label");

for (let i = 0; i < labels.length; i++) {
    labels[i].classList.remove("col-sm-2");
    labels[i].classList.add("col-sm-1");
    labels[i].classList.add("offset-sm-1");
}
