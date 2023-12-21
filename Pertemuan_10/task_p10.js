/**
 * Fungsi untuk menampilkan hasil download
 * @param {string} result - Nama file yang didownload
 */
const showDownload = (result) => {
    console.log("Download selesai");
    console.log("Hasil Download: " + result);
  }
  
  /**
   * Fungsi untuk download file
   * @param {function} callback - Function callback show
   */
  const download = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
         const result = "windows-10.exe";
       resolve(result);
        }, 3000);
      })
     }
  
 
  
  download()
  .then(showDownload);

 