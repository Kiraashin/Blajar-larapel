function selectThumbnail(btn, type) {
  document.querySelectorAll('#materialOptions + * button, .col-3 button').forEach(b => {
    b.classList.remove('border-primary', 'border-2');
    b.classList.add('opacity-75');
  });
  btn.classList.add('border-primary', 'border-2');
  btn.classList.remove('opacity-75');

  const card = document.getElementById('mainCardVisual');
  if (type === 'depan') {
    card.style.transform = 'rotate(-3deg)';
    card.style.background = 'linear-gradient(135deg, #0e1e38 0%, #1e3a63 60%, #0d223f 100%)';
  } else if (type === 'belakang') {
    card.style.transform = 'rotate(2deg) scale(0.98)';
    card.style.background = 'linear-gradient(135deg, #162438 0%, #0b1524 100%)';
  } else if (type === 'tekstur') {
    card.style.transform = 'scale(1.05) rotate(0deg)';
    card.style.background = 'radial-gradient(circle, #2a4365 0%, #0c182b 100%)';
  } else if (type === 'packaging') {
    card.style.transform = 'rotate(-1deg) scale(0.95)';
    card.style.background = 'linear-gradient(135deg, #2b3b52 0%, #111e2f 100%)';
  }
}

function setCustomQty(val) {
  document.getElementById('customQtyInput').value = val;
  updatePrice();
}

function adjustQty(delta) {
  const input = document.getElementById('customQtyInput');
  let current = parseInt(input.value) || 1;
  current = Math.max(1, current + delta);
  input.value = current;

  // sync radio buttons if matching
  const radios = document.querySelectorAll('input[name="quickQty"]');
  radios.forEach(r => {
    r.checked = (parseInt(r.value) === current);
  });

  updatePrice();
}

function updatePrice() {
  const qty = parseInt(document.getElementById('customQtyInput').value) || 1;
  
  // Base per box
  let basePerBox = 45000;

  // Paper type
  const paperType = document.querySelector('input[name="paperType"]:checked')?.value;
  const matLabel = document.getElementById('selectedMaterialLabel');
  if (paperType === 'ac310') {
    basePerBox = 45000;
    if(matLabel) matLabel.innerText = 'Art Carton 310gsm';
  } else if (paperType === 'splendor') {
    basePerBox = 65000;
    if(matLabel) matLabel.innerText = 'Splendorgel 300gsm';
  } else if (paperType === 'matte') {
    basePerBox = 55000;
    if(matLabel) matLabel.innerText = 'Matte Paper 350gsm';
  }

  // Sisi
  const printSides = document.querySelector('input[name="printSides"]:checked')?.value;
  if (printSides === '2sisi') {
    basePerBox += 12000;
  }

  // Finishing per box
  let finishTotal = 0;
  if (document.getElementById('finishSpotUV')?.checked) finishTotal += 20000;
  if (document.getElementById('finishFoil')?.checked) finishTotal += 25000;
  if (document.getElementById('finishRoundCorner')?.checked) finishTotal += 5000;

  let subtotal = (basePerBox + finishTotal) * qty;

  // Design fee flat
  if (document.getElementById('needDesignService')?.checked) {
    subtotal += 25000;
  }

  // Tier Diskon
  let discountRate = 0;
  const tierBadge = document.getElementById('tierDiscountBadge');
  if (qty >= 10) {
    discountRate = 0.25;
    if (tierBadge) tierBadge.innerText = 'Diskon Grosir 25%';
  } else if (qty >= 5) {
    discountRate = 0.15;
    if (tierBadge) tierBadge.innerText = 'Diskon Grosir 15%';
  } else if (qty >= 2) {
    discountRate = 0.10;
    if (tierBadge) tierBadge.innerText = 'Diskon Grosir 10%';
  } else {
    discountRate = 0;
    if (tierBadge) tierBadge.innerText = 'Harga Satuan';
  }

  const originalTotal = subtotal;
  const finalTotal = Math.round(subtotal * (1 - discountRate));
  const perBoxPrice = Math.round(finalTotal / qty);

  document.getElementById('totalPriceDisplay').innerText = 'Rp ' + finalTotal.toLocaleString('id-ID');
  document.getElementById('strikethroughPrice').innerText = 'Rp ' + originalTotal.toLocaleString('id-ID');
  document.getElementById('pricePerBox').innerText = 'Rp ' + perBoxPrice.toLocaleString('id-ID');
}

function handleFileSelected(input) {
  if (input.files && input.files[0]) {
    const fileName = input.files[0].name;
    document.getElementById('uploadLabel').innerHTML = '<span class="text-success"><i class="bi bi-file-earmark-check-fill me-1"></i> ' + fileName + '</span> siap diunggah!';
  }
}

function handleAddToCart() {
  alert('Produk Kartu Nama Premium Spot UV berhasil dimasukkan ke Keranjang Belanja!');
}

function handleCheckout() {
  window.location.href = 'keranjang.html';
}

// Run initial on page load
document.addEventListener('DOMContentLoaded', () => {
  updatePrice();
});
