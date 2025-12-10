const options = {
  root: null, // Use the document's viewport as the root
  rootMargin: '0px', // No margin
  threshold: 0.3 // Trigger callback when 50% of the target is visible
};

const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('animate_active');
    } else {
      entry.target.classList.remove('animate_active');
    }
  });
}, options);

document.querySelectorAll('.animate').forEach(element => {
  observer.observe(element);
});

let inputCel = document.querySelectorAll('.input-whatsapp');
inputCel.forEach(cel => {
  cel.addEventListener('input', function () {
    let valor = mtel(this.value);
    this.value = valor;
  });
})
function mtel(v) {
  v = v.replace(/\D/g, "");
  v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
  v = v.replace(/(\d)(\d{4})$/, "$1-$2");
  return v;
}