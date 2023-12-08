const persiapan= () =>{
    return new Promise((resolve) => {
        setTimeout(()=> {
            resolve("menyiapkan bahan")
       
    },3000);
});
};

const rebusair= () =>{
    return new Promise((resolve) => {
        setTimeout(()=> {
            resolve("merebusair...")
       
    },7000);
});
};

const masak= () =>{
    return new Promise((resolve) => {
        setTimeout(()=> {
            resolve("masak mie...")
       
    },5000);
});
};

const main = () => {
    persiapan() 
    .then ((res) => {
        console.log(res);
        return rebusair();
    })
    .then ((res) => {
        console.log(res);
        return masak();
    })
    .then ((res) => {
        console.log(res);
    });
};
main();