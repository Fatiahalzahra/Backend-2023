const fs = require('fs');

// TODO 3: Import data students dari folder data/students.js
const studentsPath = './data/students.js';
const students = require(studentsPath);

// Membuat Class StudentController
class StudentController {
  index(req, res) {
    // TODO 4: Tampilkan data students
    res.json(students);
  }

  store(req, res) {
    // TODO 5: Tambahkan data students
    const newStudent = req.body; // asumsikan data baru dikirimkan melalui body request
    students.push(newStudent);
    saveStudentsToFile();
    res.json({ message: 'Data mahasiswa berhasil ditambahkan.' });
  }

  update(req, res) {
    // TODO 6: Update data students
    const studentId = req.params.id;
    const updatedStudent = req.body; // asumsikan data yang akan diupdate dikirimkan melalui body request
    const index = students.findIndex(student => student.id == studentId);

    if (index !== -1) {
      students[index] = { ...students[index], ...updatedStudent };
      saveStudentsToFile();
      res.json({ message: 'Data mahasiswa berhasil diupdate.' });
    } else {
      res.status(404).json({ error: 'Data mahasiswa tidak ditemukan.' });
    }
  }

  destroy(req, res) {
    // TODO 7: Hapus data students
    const studentId = req.params.id;
    const index = students.findIndex(student => student.id == studentId);

    if (index !== -1) {
      students.splice(index, 1);
      saveStudentsToFile();
      res.json({ message: 'Data mahasiswa berhasil dihapus.' });
    } else {
      res.status(404).json({ error: 'Data mahasiswa tidak ditemukan.' });
    }
  }
}

// Membuat object StudentController
const studentController = new StudentController();

// Export object StudentController
module.exports = studentController;

// Fungsi untuk menyimpan data students ke file
function saveStudentsToFile() {
  fs.writeFileSync(studentsPath, 'module.exports = ' + JSON.stringify(students, null, 2));
}
