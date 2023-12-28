// Import database
const db = require("../config/database");

// Membuat model Student
class Student {
    // Mendapatkan semua data mahasiswa
    static all() {
        return new Promise((resolve, reject) => {
            // Lakukan query ke db untuk mengambil data
            const sql = "SELECT * FROM students";
            db.query(sql, (err, results) => {
                if (err) {
                    reject(err);
                } else {
                    resolve(results);
                }
            });
        });
    }

   //To do 1
    static create(studentData) {
        return new Promise((resolve, reject) => {
            const sql = "INSERT INTO students SET ?";
            db.query(sql, studentData, (err, results) => {
                if (err) {
                    reject(err);
                } else {
                    // Memanggil metode show untuk mendapatkan data mahasiswa yang baru diinsert
                    resolve(this.show(results.insertId));
                }
            });
        });
    }

    // Mendapatkan data mahasiswa berdasarkan ID
    static show(id) {
        return new Promise((resolve, reject) => {
            const sql = `SELECT * FROM students WHERE id = ${id}`;
            db.query(sql, (err, results) => {
                if (err) {
                    reject(err);
                } else {
                    resolve(results);
                }
            });
        });
    }
}

// Export model Student
module.exports = Student;
