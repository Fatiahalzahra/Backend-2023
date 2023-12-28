// TODO 3: Import data students dari folder data/students.js
const studentsData = require('../data/students').default;

// Membuat Class StudentController
class StudentController {
  index(req, res) {
    // TODO 4: Tampilkan data students
    res.json(studentsData);
  }

  store(req, res) {
    // TODO 5: Tambahkan data students
    const newStudent = req.body;
    studentsData.push(newStudent);
    res.json({ message: 'Student added successfully', data: newStudent });
  }

  update(req, res) {
    // TODO 6: Update data students
    const studentId = req.params.id;
    const updatedData = req.body; 

    // Cari siswa berdasarkan ID
    const student = studentsData.find((student) => student.id === parseInt(studentId));

    // Jika siswa ditemukan, update data
    if (student) {
      Object.assign(student, updatedData);
      res.json({ message: 'Student updated successfully', data: student });
    } else {
      res.status(404).json({ message: 'Student not found' });
    }
  }

  destroy(req, res) {
    // TODO 7: Hapus data students
    const studentId = req.params.id;

    // Cari indeks siswa berdasarkan ID
    const studentIndex = studentsData.findIndex((student) => student.id === parseInt(studentId));

    // Jika siswa ditemukan, hapus data
    if (studentIndex !== -1) {
      const deletedStudent = studentsData.splice(studentIndex, 1);
      res.json({ message: 'Student deleted successfully', data: deletedStudent });
    } else {
      res.status(404).json({ message: 'Student not found' });
    }
  }
}

// Membuat object StudentController
const studentController = new StudentController();

// Export object StudentController
module.exports = studentController;
