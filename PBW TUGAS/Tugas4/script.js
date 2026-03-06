function cekNilai() {
  const nim = document.getElementById("nim").value;
  const nilai = parseInt(document.getElementById("nilai").value);
  let hurufMutu = "";

  if (nilai < 0 || nilai > 100) {
    document.getElementById("hasil").innerHTML = "Nilai tidak valid!";
    return;
  }

  if (nilai >= 80) hurufMutu = "A";
  else if (nilai >= 70) hurufMutu = "B";
  else if (nilai >= 60) hurufMutu = "C";
  else if (nilai >= 50) hurufMutu = "D";
  else hurufMutu = "E";

  document.getElementById("hasil").innerHTML =
    "NIM: " + nim + "<br>Nilai: " + nilai + "<br>Huruf Mutu: " + hurufMutu;
}

document.getElementById("cekBtn").addEventListener("click", cekNilai);