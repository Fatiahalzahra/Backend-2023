const persiapan= () =>{
    console.log("persiapan...");

}

const rebusair = () =>{
    console.log("rebusair...");
    
}

const masak= () =>{
    console.log("memasak mie...");
    console.log("selesai");
}

const main= () =>{
    setTimeout(()=>{
        persiapan();
    setTimeout(()=>{
            merebusair();
    setTimeout(()=>{
                masak();
    }, 5000);
    }, 7000);
    }, 3000);
    
};

main();