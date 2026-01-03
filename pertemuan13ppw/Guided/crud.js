const connection = require("./db");

// CREATE
function createMahasiswa(nama, nim, jurusan, email, callback) {
  const query =
    "INSERT INTO mahasiswa (nama, nim, jurusan, email) VALUES (?, ?, ?, ?)";
  connection.query(query, [nama, nim, jurusan, email], callback);
}

// READ
function getAllMahasiswa(callback) {
  const query = "SELECT * FROM mahasiswa";
  connection.query(query, callback);
}

// UPDATE
function updateMahasiswa(id, nama, nim, jurusan, email, callback) {
  const query =
    "UPDATE mahasiswa SET nama=?, nim=?, jurusan=?, email=? WHERE id=?";
  connection.query(query, [nama, nim, jurusan, email, id], callback);
}

// DELETE
function deleteMahasiswa(id, callback) {
  const query = "DELETE FROM mahasiswa WHERE id=?";
  connection.query(query, [id], callback);
}

module.exports = {
  createMahasiswa,
  getAllMahasiswa,
  updateMahasiswa,
  deleteMahasiswa,
};
