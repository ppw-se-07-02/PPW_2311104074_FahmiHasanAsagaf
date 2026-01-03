const db = require("./db");

// CREATE
function createMahasiswa(nama, nim, jurusan, email, callback) {
  const sql =
    "INSERT INTO mahasiswa (nama, nim, jurusan, email) VALUES (?, ?, ?, ?)";
  db.query(sql, [nama, nim, jurusan, email], callback);
}

// READ
function getMahasiswa(callback) {
  db.query("SELECT * FROM mahasiswa", callback);
}

// UPDATE
function updateMahasiswa(id, nama, nim, jurusan, email, callback) {
  const sql =
    "UPDATE mahasiswa SET nama=?, nim=?, jurusan=?, email=? WHERE id=?";
  db.query(sql, [nama, nim, jurusan, email, id], callback);
}

// DELETE
function deleteMahasiswa(id, callback) {
  db.query("DELETE FROM mahasiswa WHERE id=?", [id], callback);
}

module.exports = {
  createMahasiswa,
  getMahasiswa,
  updateMahasiswa,
  deleteMahasiswa,
};
