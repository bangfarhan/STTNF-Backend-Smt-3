const  {index, store,update,destroy} = require ("./fruitController.js");
const main  = () =>{
    console.log("Methode index - menampilkan buah:");
    index();
    console.log();
    console.log("Methode store - menambahkan buah Pisang:");
    store("Pisang");
    console.log();
    console.log("Methode update - update data 0 menjadi kelapa:");
    update(0,"Kelapa");
    console.log();
    console.log("Methode destroy - menghapus data 0:");
    destroy(0);
};
main();