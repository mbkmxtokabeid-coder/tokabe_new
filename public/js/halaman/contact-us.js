var cleaveDelimiters, cleaveBlocks, hargaModal, hargaJual, cleaveNumeral;

document.querySelector("#phone-number") && (cleaveNumeral = new Cleave("#phone-number", { delimiters: [" "], blocks: [4, 4, 4, 4] }))
  ;
document.querySelectorAll('[data-cleave]').forEach(function (element) {
  var cleaveConfig = JSON.parse(element.getAttribute('data-cleave'));
  new Cleave(element, cleaveConfig);
});
