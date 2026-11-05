document.addEventListener('DOMContentLoaded', function () {
  const WA_NUMBER = '6287772310250';
  const form = document.getElementById('kontakForm');

  const val = function (id) {
    return form.elements[id].value.trim();
  };

  // Message template follows the CS WhatsApp template used on primagraphia.co.id
  function buildMessage() {
    return [
      'Halo, saya ada kebutuhan cetak sebagai berikut:',
      '- Produk : ' + val('produk'),
      '- Ukuran : ' + val('ukuran'),
      '- Quantity : ' + val('quantity'),
      '- Bahan : ' + val('bahan'),
      '- Finishing : ' + val('finishing'),
      '',
      'Adapun berikut data saya:',
      '- Nama : ' + val('nama'),
      '- No ID : ' + (val('noId') || '-'),
      '- No. WhatsApp : ' + val('whatsapp'),
      '- Alamat : ' + val('alamat'),
      '',
      'Terima Kasih'
    ].join('\n');
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    if (!form.checkValidity()) {
      form.classList.add('was-validated');
      const firstInvalid = form.querySelector(':invalid');
      if (firstInvalid) firstInvalid.focus();
      return;
    }
    form.classList.remove('was-validated');
    window.open('https://wa.me/' + WA_NUMBER + '?text=' + encodeURIComponent(buildMessage()), '_blank', 'noopener');
  });
});
