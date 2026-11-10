// Klik gambar bertanda data-zoom untuk memperbesar. Navigasi: tombol, panah keyboard, Esc.
(function () {
  var imgs = [].slice.call(document.querySelectorAll('img[data-zoom]'));
  if (!imgs.length) return;
  var ov = document.createElement('div');
  ov.className = 'lb';
  ov.innerHTML = '<button class="lb-x" aria-label="Tutup">×</button><button class="lb-p" aria-label="Sebelumnya">‹</button><img alt=""><button class="lb-n" aria-label="Berikutnya">›</button><p></p>';
  document.body.appendChild(ov);
  var big = ov.querySelector('img'), cap = ov.querySelector('p'), i = 0, list = [];
  function show(n) {
    i = (n + list.length) % list.length;
    var s = list[i];
    big.src = s.currentSrc || s.src; big.alt = s.alt; cap.textContent = s.alt;
    ov.classList.toggle('single', list.length < 2);
  }
  function open(el) {
    var g = el.getAttribute('data-group');
    list = imgs.filter(function (x) { return x.getAttribute('data-group') === g; });
    show(list.indexOf(el));
    ov.classList.add('on'); document.body.style.overflow = 'hidden';
  }
  function close() { ov.classList.remove('on'); document.body.style.overflow = ''; }
  imgs.forEach(function (el) {
    el.tabIndex = 0; el.setAttribute('role', 'button');
    el.addEventListener('click', function () { open(el); });
    el.addEventListener('keydown', function (e) { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); open(el); } });
  });
  ov.addEventListener('click', function (e) {
    var c = e.target.className;
    if (e.target === ov || c === 'lb-x') close();
    else if (c === 'lb-p') show(i - 1);
    else if (c === 'lb-n') show(i + 1);
  });
  document.addEventListener('keydown', function (e) {
    if (!ov.classList.contains('on')) return;
    if (e.key === 'Escape') close();
    if (e.key === 'ArrowLeft') show(i - 1);
    if (e.key === 'ArrowRight') show(i + 1);
  });
})();
