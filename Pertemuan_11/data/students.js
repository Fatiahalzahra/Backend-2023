// TODO 1: Buat data students
const students = [
    {
      id: 1,
      name: 'Fatiah',
      age: 20,
      grade: 'A'
    },
    {
      id: 2,
      name: 'Alaskara Dirgantara',
      age: 22,
      grade: 'B'
    },
    {
      id: 3,
      name: 'Kinaan Ozama',
      age: 21,
      grade: 'C'
    }
  ];
  
  // TODO 2: Export data students
  // Jika di lingkungan Node.js (gunakan CommonJS)
  if (typeof module !== 'undefined' && module.exports) {
    module.exports = students;
  }
  
  // Jika di lingkungan browser
  if (typeof window !== 'undefined') {
    window.students = students;
  }
  