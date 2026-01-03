const express = require("express");
const crud = require("./crud");

const app = express();
const port = 3000;

app.use(express.json());
app.use(express.static("public"));

// CREATE
app.post("/mahasiswa", (req, res) => {
  const { nama, nim, jurusan, email } = req.body;
  crud.createMahasiswa(nama, nim, jurusan, email, (err) => {
    if (err) return res.status(500).send("Gagal tambah data");
    res.send("Data berhasil ditambahkan");
  });
});

// READ
app.get("/mahasiswa", (req, res) => {
  crud.getMahasiswa((err, data) => {
    if (err) return res.status(500).send("Gagal ambil data");
    res.json(data);
  });
});

// UPDATE
app.put("/mahasiswa/:id", (req, res) => {
  const { id } = req.params;
  const { nama, nim, jurusan, email } = req.body;
  crud.updateMahasiswa(id, nama, nim, jurusan, email, (err) => {
    if (err) return res.status(500).send("Gagal update");
    res.send("Data berhasil diupdate");
  });
});

// DELETE
app.delete("/mahasiswa/:id", (req, res) => {
  crud.deleteMahasiswa(req.params.id, (err) => {
    if (err) return res.status(500).send("Gagal hapus");
    res.send("Data berhasil dihapus");
  });
});

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});
